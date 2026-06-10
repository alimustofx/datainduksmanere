<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads; // TAMBAHAN: Diperlukan untuk handle upload file di Livewire
use App\Models\Student;

class VerifikasiIjazah extends Component
{
    use WithFileUploads; // TAMBAHAN: Mengaktifkan fitur unggah file

    public $nisn = '';
    public $student = null;
    
    // Form input state
    public $nomor_ijazah = '';
    public $tanggal_ijazah = '';
    public $file_ijazah = null; // TAMBAHAN: Properti state untuk menampung file ijazah baru

    protected $rules = [
        'nomor_ijazah' => 'required|string|min:5|max:50',
        'tanggal_ijazah' => 'required|date',
        'file_ijazah' => 'required|file|mimes:pdf|max:2048', // TAMBAHAN: Aturan ijazah wajib PDF maksimal 2MB
    ];

    protected $messages = [
        'nomor_ijazah.required' => 'Nomor ijazah wajib diisi.',
        'nomor_ijazah.min' => 'Nomor ijazah minimal berisikan 5 karakter.',
        'nomor_ijazah.max' => 'Nomor ijazah maksimal berisikan 50 karakter.',
        'tanggal_ijazah.required' => 'Tanggal kelulusan ijazah wajib diisi.',
        'file_ijazah.required' => 'Berkas fisik ijazah asli wajib diunggah.',
        'file_ijazah.mimes' => 'Berkas ijazah harus berformat PDF.',
        'file_ijazah.max' => 'Ukuran file ijazah maksimal adalah 2MB.',
    ];

    public function checkNisn()
    {
        $this->validate([
            'nisn' => 'required|numeric|digits:10'
        ], [
            'nisn.required' => 'NISN wajib dimasukkan.',
            'nisn.numeric' => 'NISN harus berupa kombinasi angka.',
            'nisn.digits' => 'NISN harus berjumlah tepat 10 digit.'
        ]);

        $this->student = Student::where('nisn', $this->nisn)->first();

        if ($this->student) {
            $this->nomor_ijazah = $this->student->nomor_ijazah;
            $this->tanggal_ijazah = $this->student->tanggal_ijazah;
            session()->forget('error');
        } else {
            session()->flash('error', 'Data siswa dengan NISN tersebut tidak ditemukan dalam sistem.');
        }
    }

    public function cancel()
    {
        // PERUBAHAN: Menambahkan reset untuk state file_ijazah
        $this->reset(['nisn', 'student', 'nomor_ijazah', 'tanggal_ijazah', 'file_ijazah']);
        session()->forget('error');
    }

    public function saveCertificate()
    {
        $this->validate();

        if ($this->student) {
            $dataUpdate = [
                'nomor_ijazah' => $this->nomor_ijazah,
                'tanggal_ijazah' => $this->tanggal_ijazah,
            ];

            // PERUBAHAN: Proses pemindahan berkas PDF ke storage private jika file diunggah
            if ($this->file_ijazah) {
                $slugNama = \Str::slug($this->student->nama_lengkap ?? 'siswa');
                
                // Format penamaan file disamakan dengan sistem utama Anda: "0103624315_nama-siswa_file_ijazah.pdf"
                $namaFileBaru = $this->student->nisn . '_' . $slugNama . '_file_ijazah.' . $this->file_ijazah->getClientOriginalExtension();
                
                // Simpan ke storage internal private: storage/app/private/berkas_pendaftaran/
                $this->file_ijazah->storeAs('berkas_pendaftaran', $namaFileBaru);
                
                // Masukkan nama file baru ke dalam antrean update database
                $dataUpdate['file_ijazah'] = $namaFileBaru;
            }

            $this->student->update($dataUpdate);

            session()->flash('success', 'Data & Berkas Asli Ijazah SMP milik ' . $this->student->nama_lengkap . ' berhasil divalidasi dan diperbarui!');
            
            // Mengosongkan form kembali setelah berhasil disimpan
            $this->reset(['nisn', 'student', 'nomor_ijazah', 'tanggal_ijazah', 'file_ijazah']);
        }
    }

    public function render()
    {
        return view('livewire.admin.ijazah')->layout('layouts.app');
    }
}