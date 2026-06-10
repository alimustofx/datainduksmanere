<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator; 

class StudentController extends Controller
{
    public function checkNpsn(Request $request)
    {
        $npsn = $request->query('npsn');
        
        if (!$npsn) {
            return response()->json(['success' => false, 'error' => 'NPSN wajib diisi'], 400);
        }

        try {
            $response = Http::timeout(5)->get("https://sekolah.devapi.id/sekolah", ['npsn' => $npsn]);

            if ($response->successful()) {
                $jsonData = $response->json();

                if (isset($jsonData['success']) && $jsonData['success'] === true && isset($jsonData['data']) && count($jsonData['data']) > 0) {
                    
                    $namaProper = mb_convert_case($jsonData['data'][0]['nama'], MB_CASE_TITLE, "UTF-8");
                    $namaSekolahMurni = $this->standarisasiNamaSekolah($namaProper);

                    return response()->json([
                        'success' => true,
                        'nama_sekolah' => $namaSekolahMurni
                    ]);
                }
            }
            
            $daftarSekolahSekitar = [
                '20517490' => 'SMP Negeri 1 Turen',
                '20517487' => 'SMP Negeri 2 Turen',
                '20546255' => 'SMP Negeri 3 Turen',
                '20581340' => 'MTs Negeri 7 Malang',
                '20554558' => 'MTs Negeri 2 Malang'
            ];

            if (array_key_exists($npsn, $daftarSekolahSekitar)) {
                return response()->json([
                    'success' => true,
                    'nama_sekolah' => $daftarSekolahSekitar[$npsn]
                ]);
            }

            return response()->json(['success' => false, 'error' => 'NPSN tidak terdaftar di sistem pusat'], 404);

        } catch (\Exception $e) {
            $daftarSekolahSekitar = [
                '20517490' => 'SMP Negeri 1 Turen',
                '20517487' => 'SMP Negeri 2 Turen',
                '20546255' => 'SMP Negeri 3 Turen',
                '20581340' => 'MTs Negeri 7 Malang',
                '20554558' => 'MTs Negeri 2 Malang'
            ];

            if (array_key_exists($npsn, $daftarSekolahSekitar)) {
                return response()->json([
                    'success' => true,
                    'nama_sekolah' => $daftarSekolahSekitar[$npsn]
                ]);
            }

            return response()->json(['success' => false, 'error' => 'Gangguan jaringan induk'], 500);
        }
    }

    /**
     * PROSES SIMPAN DATA INDUK DAN FILE PENDUKUNG KE DATABASE
     */
    public function store(Request $request)
    {
        // Amankan salinan input teks mentah di baris paling awal
        $seluruhInput = $request->all();

        // 1. Definisikan Aturan Validasi Kritis berkas dokumen pendaftaran
        $rules = [
            'nisn' => 'required|string|size:10|unique:students,nisn',
            'nik' => 'required|string|size:16|unique:students,nik',
            'email' => 'required|email|unique:students,email',
            'file_kartu_keluarga' => 'required|file|mimes:pdf|max:2048',
            'file_skl' => 'required|file|mimes:pdf|max:2048',
            'file_bukti_spmb' => 'required|file|mimes:pdf|max:2048',
            'file_surat_pernyataan' => 'required|file|mimes:pdf|max:2048',
        ];

        $messages = [
            'nisn.unique' => 'NISN ini sudah terdaftar di sistem.',
            'nik.unique' => 'NIK ini sudah digunakan pendaftar lain.',
            'email.unique' => 'Alamat Email sudah terdaftar.',
            'file_kartu_keluarga.required' => 'Berkas Kartu Keluarga wajib diunggah.',
            'file_kartu_keluarga.mimes' => 'Berkas Kartu Keluarga harus berformat PDF.',
            'file_skl.required' => 'Berkas SKL wajib diunggah.',
            'file_skl.mimes' => 'Berkas SKL harus berformat PDF.',
            'file_bukti_spmb.required' => 'Berkas Bukti SPMB wajib diunggah.',
            'file_bukti_spmb.mimes' => 'Berkas Bukti SPMB harus berformat PDF.',
            'file_surat_pernyataan.required' => 'Berkas Surat Pernyataan wajib diunggah.',
            'file_surat_pernyataan.mimes' => 'Berkas Surat Pernyataan harus berformat PDF.',
            'file_kartu_keluarga.max' => 'Ukuran maksimal berkas adalah 2MB.',
            'file_skl.max' => 'Ukuran maksimal berkas adalah 2MB.',
            'file_bukti_spmb.max' => 'Ukuran maksimal berkas adalah 2MB.',
            'file_surat_pernyataan.max' => 'Ukuran maksimal berkas adalah 2MB.',
        ];

        // Buat objek validator manual
        $validator = Validator::make($seluruhInput, $rules, $messages);

        // JIKA VALIDASI GAGAL
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($seluruhInput) 
                ->withErrors($validator);  
        }

        try {
            // Ambil seluruh inputan teks form (kecuali file objek berkas pendaftaran)
            $data = $request->except(['file_kartu_keluarga', 'file_skl', 'file_bukti_spmb', 'file_surat_pernyataan']);

            // Buat slug nama siswa untuk standarisasi nama file dokumen pendaftar
            $slugNama = \Str::slug($request->nama_lengkap ?? 'siswa');
            $nisn = $request->nisn;

            // 2. Logika Proses Upload & Rename Berkas PDF ke Storage Private (TERPROTEKSI)
            $berkasList = ['file_kartu_keluarga', 'file_skl', 'file_bukti_spmb', 'file_surat_pernyataan'];
            
            foreach ($berkasList as $berkas) {
                if ($request->hasFile($berkas)) {
                    $file = $request->file($berkas);
                    
                    // Format nama baru: "0103624315_nama-siswa_file_skl.pdf"
                    $namaFileBaru = $nisn . '_' . $slugNama . '_' . $berkas . '.' . $file->getClientOriginalExtension();
                    
                    // FIXED: Menghapus parameter 'public'. Berkas masuk ke folder private: storage/app/private/berkas_pendaftaran/
                    $file->storeAs('berkas_pendaftaran', $namaFileBaru);
                    
                    // Simpan strings nama filenya saja ke array data database
                    $data[$berkas] = $namaFileBaru;
                }
            }

            // Tambahkan status default verifikasi registrasi pendaftaran baru
            $data['status_verifikasi'] = 'Proses';

            // 3. Eksekusi penyimpanan data rekam ke database via Eloquent Model
            Student::create($data);

            // Jika berhasil tanpa hambatan, beri notifikasi sukses ke user
            return redirect()->back()->with('success', 'Selamat, Data Induk Anda berhasil diverifikasi dan disimpan ke sistem!');

        } catch (\Exception $e) {
            // Tangani jika terjadi error database (Query Exception, dsb) secara darurat
            return redirect()->back()
                ->withInput($seluruhInput) 
                ->withErrors(['error' => 'Terjadi kesalahan sistem saat menyimpan data: ' . $e->getMessage()]);
        }
    }

    private function standarisasiNamaSekolah($string)
    {
        $search = ['Smp', 'Smk', 'Mts', 'Sd', 'Mi', 'Mtsn'];
        $replace = ['SMP', 'SMK', 'MTs', 'SD', 'MI', 'MTs Negeri'];
        
        $string = str_replace($search, $replace, $string);
        $string = str_replace('MTs Negeri Negeri', 'MTs Negeri', $string);

        return $string;
    }

    /**
     * FUNGSI KHUSUS UNTUK ADMIN MELIHAT PRATINJAU (PREVIEW) BERKAS PRIVATE SECARA AMAN
     */
    public function downloadPrivateFile($id, $jenis_berkas)
    {
        // 1. MODIFIKASI: Menambahkan 'file_ijazah' ke dalam whitelist pengecekan agar diizinkan diakses admin
        $berkasValid = ['file_kartu_keluarga', 'file_skl', 'file_bukti_spmb', 'file_surat_pernyataan', 'file_ijazah'];
        if (!in_array($jenis_berkas, $berkasValid)) {
            abort(403, 'Akses jenis berkas tidak diizinkan.');
        }

        // 2. Cari data siswa berdasarkan ID unik primary key
        $student = Student::findOrFail($id);

        // 3. Ambil string nama file dari database sesuai kolom berkas terkait
        $namaFile = $student->$jenis_berkas;

        // Jika data di kolom database kosong/siswa tidak atau belum mengunggah berkas tersebut
        if (!$namaFile) {
            abort(404, 'Siswa belum mengunggah berkas ini.');
        }

        // 4. Bangun path lokasi berkas di dalam sistem storage internal (private)
        $pathLengkap = 'berkas_pendaftaran/' . $namaFile;

        // 5. Cek kepastian fisik file ada di dalam server Ubuntu
        if (!Storage::exists($pathLengkap)) {
            abort(404, 'File dokumen fisik tidak ditemukan di server.');
        }

        // 6. FIXED: response()->file() agar file dirender langsung (Inline Preview) oleh browser
        // Menggunakan storage_path untuk mengambil full path sistem operasi Ubuntu Anda
        return response()->file(storage_path('app/private/' . $pathLengkap), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $namaFile . '"'
        ]);
    }
}