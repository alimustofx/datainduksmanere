<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Dashboard extends Component
{
    use WithPagination;

    public $currentTab = 'dashboard';
    public $search = '';
    public $filterStage = ''; 
    public $filterStatus = ''; 
    public $perPage = 10;

    // State Kontrol Modal Detail Data Induk & Berkas
    public $selectedStudent = null;
    public $showModal = false;

    protected $queryString = [
        'currentTab' => ['except' => 'dashboard'],
        'search' => ['except' => ''],
        'filterStage' => ['except' => ''],
        'filterStatus' => ['except' => ''],
    ];

    public function updatingSearch() { $this->resetPage(); }
    public function updatingFilterStage() { $this->resetPage(); }
    public function updatingFilterStatus() { $this->resetPage(); }

    public function switchTab($tab)
    {
        $this->currentTab = $tab;
        $this->resetPage();
    }

    public function toggleVerifikasi($studentId)
    {
        $student = Student::find($studentId);
        if ($student) {
            if ($student->status_verifikasi === 'Proses') {
                $student->update([
                    'status_verifikasi' => 'Selesai',
                    'is_passed' => true
                ]);
                session()->flash('message', 'Siswa ' . $student->nama_lengkap . ' telah diverifikasi.');
            } else {
                $student->update([
                    'status_verifikasi' => 'Proses',
                    'is_passed' => false
                ]);
                session()->flash('message', 'Status verifikasi siswa ' . $student->nama_lengkap . ' dibatalkan.');
            }
        }
    }

    public function showDetail($studentId)
    {
        $this->selectedStudent = Student::find($studentId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedStudent = null;
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);

        if ($student) {
            // Himpunan berkas pendaftaran yang dimiliki siswa
            $berkasList = [
                $student->file_kartu_keluarga,
                $student->file_skl,
                $student->file_bukti_spmb,
                $student->file_surat_pernyataan,
                $student->file_ijazah // Termasuk ijazah baru yang kita tambahkan kemarin
            ];

            // Looping penghapusan file dari disk lokal/server private storage
            foreach ($berkasList as $namaFile) {
                if ($namaFile && Storage::exists('berkas_pendaftaran/' . $namaFile)) {
                    Storage::delete('berkas_pendaftaran/' . $namaFile);
                }
            }

            // Hapus data baris record siswa dari database
            $student->delete();

            // Memunculkan pesan sukses di dashboard
            session()->flash('message', 'Data pendaftar ilegal/penyusup berhasil dibersihkan permanen.');
        }
    }

    public function exportExcel()
    {
        // 1. Ambil seluruh data pendaftar dari DB
        $students = Student::all();

        // 2. Daftar tajuk kolom lengkap sesuai skema tabel
        $headers = [
            'ID', 'Is Passed', 'Passed Stage', 'Nama Lengkap', 'Nama Panggilan', 'Jenis Kelamin', 
            'Tempat Lahir', 'Tanggal Lahir', 'NISN', 'NPSN SMP', 'Nama SMP', 'NIK', 'No KK', 
            'No Akta Kelahiran', 'Agama', 'Kewarganegaraan', 'Bahasa Harian', 'Email', 'Anak Ke', 
            'Jumlah Saudara Kandung', 'Jumlah Saudara Tiri', 'Jumlah Saudara Angkat', 'Status Keluarga', 
            'No HP', 'Ayah Nama', 'Ayah NIK', 'Ayah Tempat Lahir', 'Ayah Tanggal Lahir', 
            'Ayah Kewarganegaraan', 'Ayah Kode Pos', 'Ayah Provinsi', 'Ayah Kabupaten/Kota', 
            'Ayah Kecamatan', 'Ayah Desa/Kelurahan', 'Ayah Alamat Jalan', 'Ayah RT', 'Ayah RW', 
            'Ayah Agama', 'Ayah Pendidikan', 'Ayah Pekerjaan', 'Ayah Pekerjaan Lainnya', 'Ayah Penghasilan', 
            'Ayah No HP', 'Ayah Status Hidup', 'Ibu Nama', 'Ibu NIK', 'Ibu Tempat Lahir', 'Ibu Tanggal Lahir', 
            'Ibu Kewarganegaraan', 'Ibu Kode Pos', 'Ibu Provinsi', 'Ibu Kabupaten/Kota', 'Ibu Kecamatan', 
            'Ibu Desa/Kelurahan', 'Ibu Alamat Jalan', 'Ibu RT', 'Ibu RW', 'Ibu Agama', 'Ibu Pendidikan', 
            'Ibu Pekerjaan', 'Ibu Pekerjaan Lainnya', 'Ibu Penghasilan', 'Ibu No HP', 'Ibu Status Hidup', 
            'Status Keberadaan Wali', 'Wali Nama', 'Wali NIK', 'Wali Hubungan', 'Wali Tempat Lahir', 
            'Wali Tanggal Lahir', 'Wali Agama', 'Wali No HP', 'Wali Pendidikan', 'Wali Pekerjaan', 
            'Wali Pekerjaan Lainnya', 'Wali Penghasilan', 'Wali Alamat Jalan', 'Wali RT', 'Wali RW', 
            'Wali Desa Kelurahan', 'Wali Kecamatan', 'Wali Kabupaten/Kota', 'Wali Provinsi', 'Wali Kode Pos', 
            'Siswa Kode Pos', 'Siswa Provinsi', 'Siswa Kabupaten/Kota', 'Siswa Kecamatan', 'Siswa Desa/Kelurahan', 
            'Siswa Alamat Jalan', 'Siswa RT', 'Siswa RW', 'Siswa Tinggal Bersama', 'Siswa Jarak Sekolah', 
            'Siswa Transportasi', 'Golongan Darah', 'Penyakit Pilihan', 'Kelainan Pilihan', 
            'Penyakit Pernah Diderita', 'Kelainan Jasmani', 'Tinggi Badan', 'Berat Badan', 'Lingkar Kepala', 
            'Tanggal Ijazah', 'Nomor Ijazah', 'Lama Belajar SMP', 'Hobi Kesenian', 'Hobi Olahraga', 
            'Hobi Organisasi', 'Hobi Lainnya', 'Cita-Cita', 'Mempunyai KIP/PKH/KKS', 'Nomor Kartu Kesejahteraan', 
            'File Kartu Keluarga', 'File SKL', 'File Bukti SPMB', 'File Surat Pernyataan', 'Status Verifikasi'
        ];

        // 3. Merakit konten dokumen beraliran HTML Table untuk memaksa pemisahan sel asli
        $callback = function() use ($students, $headers) {
            $output = fopen('php://output', 'w');
            
            // Injeksi tag pembuka HTML & CSS Kustom untuk layout Excel profesional
            fwrite($output, '
            <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
            <head>
                <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
                <style>
                    .text-mode { mso-number-format:"\@"; } /* Memaksa Excel membaca string murni (menjaga angka 0 di depan & string panjang) */
                    th { background-color: #1F4E78; color: #FFFFFF; font-weight: bold; border: 0.5pt solid #D9D9D9; text-align: center; font-family: Arial; font-size: 11pt; height: 28px; }
                    td { border: 0.5pt solid #D9D9D9; font-family: Arial; font-size: 10pt; vertical-align: middle; }
                </style>
            </head>
            <body>
            <table>
                <thead>
                    <tr>');

            // Cetak Kepala Kolom
            foreach ($headers as $header) {
                fwrite($output, '<th>' . htmlspecialchars($header) . '</th>');
            }
            
            fwrite($output, '</tr></thead><tbody>');

            // Jalankan Iterasi Baris Data Calon Siswa
            foreach ($students as $student) {
                fwrite($output, '<tr>');
                fwrite($output, '<td>' . $student->id . '</td>');
                fwrite($output, '<td>' . ($student->is_passed ? '1' : '0') . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->passed_stage) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->nama_lengkap) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->nama_panggilan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->jenis_kelamin) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->tempat_lahir) . '</td>');
                fwrite($output, '<td>' . $student->tanggal_lahir . '</td>');
                
                // Penerapan kelas .text-mode pada data sensitif angka panjang
                fwrite($output, '<td class="text-mode">' . $student->nisn . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->npsn_smp . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->nama_smp) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->nik . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->no_kk . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->no_akta_kelahiran) . '</td>');
                
                fwrite($output, '<td>' . htmlspecialchars($student->agama) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->kewarganegaraan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->bahasa_harian) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->email) . '</td>');
                fwrite($output, '<td>' . $student->anak_ke . '</td>');
                fwrite($output, '<td>' . $student->jumlah_saudara_kandung . '</td>');
                fwrite($output, '<td>' . $student->jumlah_saudara_tiri . '</td>');
                fwrite($output, '<td>' . $student->jumlah_saudara_angkat . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->status_keluarga) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->no_hp . '</td>');
                
                // Data Ayah
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_nama) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ayah_nik . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_tempat_lahir) . '</td>');
                fwrite($output, '<td>' . $student->ayah_tanggal_lahir . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_kewarganegaraan) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ayah_kode_pos . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_provinsi) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_kabupaten_kota) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_kecamatan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_desa_kelurahan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_alamat_jalan) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ayah_rt . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ayah_rw . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_agama) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_pendidikan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_pekerjaan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_pekerjaan_lainnya) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_penghasilan) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ayah_no_hp . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ayah_status_hidup) . '</td>');
                
                // Data Ibu
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_nama) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ibu_nik . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_tempat_lahir) . '</td>');
                fwrite($output, '<td>' . $student->ibu_tanggal_lahir . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_kewarganegaraan) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ibu_kode_pos . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_provinsi) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_kabupaten_kota) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_kecamatan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_desa_kelurahan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_alamat_jalan) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ibu_rt . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ibu_rw . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_agama) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_pendidikan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_pekerjaan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_pekerjaan_lainnya) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_penghasilan) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->ibu_no_hp . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->ibu_status_hidup) . '</td>');
                
                // Data Wali
                fwrite($output, '<td>' . htmlspecialchars($student->status_keberadaan_wali) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_nama) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->wali_nik . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_hubungan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_tempat_lahir) . '</td>');
                fwrite($output, '<td>' . $student->wali_tanggal_lahir . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_agama) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->wali_no_hp . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_pendidikan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_pekerjaan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_pekerjaan_lainnya) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_penghasilan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_alamat_jalan) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->wali_rt . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->wali_rw . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_desa_kelurahan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_kecamatan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_kabupaten_kota) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->wali_provinsi) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->wali_kode_pos . '</td>');
                
                // Data Alamat Siswa
                fwrite($output, '<td class="text-mode">' . $student->siswa_kode_pos . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->siswa_provinsi) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->siswa_kabupaten_kota) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->siswa_kecamatan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->siswa_desa_kelurahan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->siswa_alamat_jalan) . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->siswa_rt . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->siswa_rw . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->siswa_tinggal_bersama) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->siswa_jarak_sekolah) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->siswa_transportasi) . '</td>');
                
                // Data Kesehatan & Kegemaran
                fwrite($output, '<td>' . htmlspecialchars($student->golongan_darah) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->penyakit_pilihan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->kelainan_pilihan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->penyakit_pernah_diderita) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->kelainan_jasmani) . '</td>');
                fwrite($output, '<td>' . $student->tinggi_badan . '</td>');
                fwrite($output, '<td>' . $student->berat_badan . '</td>');
                fwrite($output, '<td>' . $student->lingkar_kepala . '</td>');
                
                // Data Akademik Sebelumnya
                fwrite($output, '<td>' . $student->tanggal_ijazah . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->nomor_ijazah . '</td>');
                fwrite($output, '<td>' . $student->lama_belajar_smp . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->hobi_kesenian) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->hobi_olahraga) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->hobi_organisasi) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->hobi_lainnya) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->cita_cita) . '</td>');
                
                // Informasi Kartu & Berkas Fisik
                fwrite($output, '<td>' . ($student->mempunyai_kip_pkh_kks ? '1' : '0') . '</td>');
                fwrite($output, '<td class="text-mode">' . $student->nomor_kartu_kesejahteraan . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->file_kartu_keluarga) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->file_skl) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->file_bukti_spmb) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->file_surat_pernyataan) . '</td>');
                fwrite($output, '<td>' . htmlspecialchars($student->status_verifikasi) . '</td>');
                fwrite($output, '</tr>');
            }
            
            fwrite($output, '</tbody></table></body></html>');
            fclose($output);
        };

        // 4. Mengirimkan HTTP Headers Resmi berekstensi .xls namun berstruktur XML/HTML Grid
        $fileName = 'Data_Induk_Siswa_Lengkap_' . date('Ymd_His') . '.xls';
        return response()->stream($callback, 200, [
            "Content-type"        => "application/vnd.ms-excel",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ]);
    }

    public function render()
    {
        $totalSiswa = Student::count();
        $totalBerkas = Student::where('file_skl', '!=', '')->whereNotNull('file_skl')->count();
        $menungguProses = Student::where('status_verifikasi', 'Proses')->count();
        $selesaiVerifikasi = Student::where('status_verifikasi', 'Selesai')->count();
        $persentaseSelesai = $totalSiswa > 0 ? round(($selesaiVerifikasi / $totalSiswa) * 100) : 0;

        $grafikData = Student::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->pluck('count', 'date');

        $students = Student::query()
            ->when($this->search, function($q) {
                $q->where('nama_lengkap', 'like', '%' . $this->search . '%')
                  ->orWhere('nisn', 'like', '%' . $this->search . '%')
                  ->orWhere('nama_smp', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterStage, function($q) {
                $q->where('passed_stage', $this->filterStage);
            })
            ->when($this->filterStatus, function($q) {
                $q->where('status_verifikasi', $this->filterStatus);
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.dashboard', [
            'students' => $students,
            'stats' => [
                'totalSiswa' => $totalSiswa,
                'totalBerkas' => $totalBerkas,
                'menungguProses' => $menungguProses,
                'selesaiVerifikasi' => $selesaiVerifikasi,
                'persentaseSelesai' => $persentaseSelesai,
                'grafikData' => $grafikData
            ]
        ])->layout('layouts.admin');
    }
}