<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Student;

class VerifikasiIjazah extends Component
{
    public $nisn = '';
    public $student = null;
    
    // Form input state
    public $nomor_ijazah = '';
    public $tanggal_ijazah = '';

    protected $rules = [
        'nomor_ijazah' => 'required|string|min:5|max:50',
        'tanggal_ijazah' => 'required|date',
    ];

    protected $messages = [
        'nomor_ijazah.required' => 'Nomor ijazah wajib diisi.',
        'tanggal_ijazah.required' => 'Tanggal kelulusan ijazah wajib diisi.',
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
        $this->reset(['nisn', 'student', 'nomor_ijazah', 'tanggal_ijazah']);
        session()->forget('error');
    }

    public function saveCertificate()
    {
        $this->validate();

        if ($this->student) {
            $this->student->update([
                'nomor_ijazah' => $this->nomor_ijazah,
                'tanggal_ijazah' => $this->tanggal_ijazah,
            ]);

            session()->flash('success', 'Data Ijazah SMP milik ' . $this->student->nama_lengkap . ' berhasil divalidasi dan diperbarui!');
            $this->reset(['nisn', 'student', 'nomor_ijazah', 'tanggal_ijazah']);
        }
    }

    public function render()
    {
        // Mengarahkan komponen ke file view miliknya, dan dibungkus oleh layouts/app.blade.php
        return view('livewire.admin.ijazah')->layout('layouts.app');
    }
}