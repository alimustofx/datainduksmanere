<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Student extends Model
{
    // Mendaftarkan semua field agar diizinkan masuk ke database
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Otomatis melakukan Capitalize Each Word untuk kolom teks tertentu sebelum disimpan.
     * Kita menggunakan Fitur Casts/Attribute Laravel terbaru.
     */
    protected function autoProperCase(): Attribute
    {
        return Attribute::make(
            set: fn (?string $value) => $value ? ucwords(strtolower($value)) : null,
        );
    }

    /**
     * Contoh menerapkan mutator otomatis ke field nama (opsional, tapi sangat aman).
     * Namun untuk efisiensi dengan 80+ field, nanti kita akan manfaatkan 
     * fungsi `ucwords()` ini langsung di Controller saat memproses data form!
     */
}