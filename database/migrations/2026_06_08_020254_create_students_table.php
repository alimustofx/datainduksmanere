<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // SECTION 1: VERIFIKASI
            $table->boolean('is_passed'); 
            $table->string('passed_stage', 50); // Dibatasi 50 karakter

            // SECTION 2: DATA PRIBADI SISWA
            $table->string('nama_lengkap', 150);
            $table->string('nama_panggilan', 50);
            $table->string('jenis_kelamin', 20); 
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('nisn', 10)->unique();
            $table->string('npsn_smp', 8);
            $table->string('nama_smp', 150); 
            $table->string('nik', 16)->unique();
            $table->string('no_kk', 16);
            $table->string('no_akta_kelahiran', 100);
            $table->string('agama', 30);
            $table->string('kewarganegaraan', 30); 
            $table->string('bahasa_harian', 50);
            $table->string('email', 100)->unique();
            $table->unsignedTinyInteger('anak_ke'); 
            $table->unsignedTinyInteger('jumlah_saudara_kandung');
            $table->unsignedTinyInteger('jumlah_saudara_tiri');
            $table->unsignedTinyInteger('jumlah_saudara_angkat');
            $table->string('status_keluarga', 30); 
            $table->string('no_hp', 20); 

            // SECTION 3: DATA AYAH
            $table->string('ayah_nama', 150)->nullable();
            $table->string('ayah_nik', 16)->nullable();
            $table->string('ayah_tempat_lahir', 100)->nullable();
            $table->date('ayah_tanggal_lahir')->nullable();
            $table->string('ayah_kewarganegaraan', 30)->nullable();
            $table->string('ayah_kode_pos', 5)->nullable();
            $table->string('ayah_provinsi', 100)->nullable();
            $table->string('ayah_kabupaten_kota', 100)->nullable();
            $table->string('ayah_kecamatan', 100)->nullable();
            $table->string('ayah_desa_kelurahan', 100)->nullable();
            $table->text('ayah_alamat_jalan')->nullable(); // Diubah ke TEXT agar hemat ukuran row data
            $table->char('ayah_rt', 3)->nullable();
            $table->char('ayah_rw', 3)->nullable();
            $table->string('ayah_agama', 30)->nullable();
            $table->string('ayah_pendidikan', 50)->nullable();
            $table->string('ayah_pekerjaan', 100)->nullable();
            $table->string('ayah_pekerjaan_lainnya', 150)->nullable(); 
            $table->string('ayah_penghasilan', 100)->nullable();
            $table->string('ayah_no_hp', 20)->nullable();
            $table->string('ayah_status_hidup', 30)->nullable();

            // SECTION 4: DATA IBU
            $table->string('ibu_nama', 150)->nullable();
            $table->string('ibu_nik', 16)->nullable();
            $table->string('ibu_tempat_lahir', 100)->nullable();
            $table->date('ibu_tanggal_lahir')->nullable();
            $table->string('ibu_kewarganegaraan', 30)->nullable();
            $table->string('ibu_kode_pos', 5)->nullable();
            $table->string('ibu_provinsi', 100)->nullable();
            $table->string('ibu_kabupaten_kota', 100)->nullable();
            $table->string('ibu_kecamatan', 100)->nullable();
            $table->string('ibu_desa_kelurahan', 100)->nullable();
            $table->text('ibu_alamat_jalan')->nullable(); // Diubah ke TEXT
            $table->char('ibu_rt', 3)->nullable();
            $table->char('ibu_rw', 3)->nullable();
            $table->string('ibu_agama', 30)->nullable();
            $table->string('ibu_pendidikan', 50)->nullable();
            $table->string('ibu_pekerjaan', 100)->nullable();
            $table->string('ibu_pekerjaan_lainnya', 150)->nullable();
            $table->string('ibu_penghasilan', 100)->nullable();
            $table->string('ibu_no_hp', 20)->nullable();
            $table->string('ibu_status_hidup', 30)->nullable();

            // SECTION 5: KONDISIONAL WALI
            $table->string('status_keberadaan_wali', 5); 
            $table->string('wali_nama', 150)->nullable();
            $table->string('wali_nik', 16)->nullable();
            $table->string('wali_hubungan', 50)->nullable();
            $table->string('wali_tempat_lahir', 100)->nullable();
            $table->date('wali_tanggal_lahir')->nullable();
            $table->string('wali_agama', 30)->nullable();
            $table->string('wali_no_hp', 20)->nullable();
            $table->string('wali_pendidikan', 50)->nullable();
            $table->string('wali_pekerjaan', 100)->nullable();
            $table->string('wali_pekerjaan_lainnya', 150)->nullable();
            $table->string('wali_penghasilan', 100)->nullable();
            $table->text('wali_alamat_jalan')->nullable(); // Diubah ke TEXT
            $table->char('wali_rt', 3)->nullable();
            $table->char('wali_rw', 3)->nullable();
            $table->string('wali_desa_kelurahan', 100)->nullable();
            $table->string('wali_kecamatan', 100)->nullable();
            $table->string('wali_kabupaten_kota', 100)->nullable();
            $table->string('wali_provinsi', 100)->nullable();
            $table->string('wali_kode_pos', 5)->nullable();

            // SECTION 6: DATA TEMPAT TINGGAL (SISWA)
            $table->string('siswa_kode_pos', 5);
            $table->string('siswa_provinsi', 100);
            $table->string('siswa_kabupaten_kota', 100);
            $table->string('siswa_kecamatan', 100);
            $table->string('siswa_desa_kelurahan', 100);
            $table->text('siswa_alamat_jalan'); // Diubah ke TEXT
            $table->char('siswa_rt', 3);
            $table->char('siswa_rw', 3);
            $table->string('siswa_tinggal_bersama', 50); 
            $table->string('siswa_jarak_sekolah', 50);   
            $table->string('siswa_transportasi', 50);    

            // SECTION 7: DATA KESEHATAN
            $table->string('golongan_darah', 5);
            $table->string('penyakit_pilihan', 100);      
            $table->string('kelainan_pilihan', 100);      
            $table->string('penyakit_pernah_diderita', 150)->nullable();
            $table->string('kelainan_jasmani', 150)->nullable();
            $table->unsignedInteger('tinggi_badan'); 
            $table->unsignedInteger('berat_badan');  
            $table->unsignedInteger('lingkar_kepala'); 

            // SECTION 8: DATA PENDIDIKAN SEBELUMNYA
            $table->date('tanggal_ijazah')->nullable(); 
            $table->string('nomor_ijazah', 100)->nullable(); 
            $table->unsignedTinyInteger('lama_belajar_smp');

            // SECTION 9: KEGEMARAN & CITA-CITA
            $table->string('hobi_kesenian', 150)->nullable();
            $table->string('hobi_olahraga', 150)->nullable();
            $table->string('hobi_organisasi', 150)->nullable();
            $table->string('hobi_lainnya', 150)->nullable();
            $table->string('cita_cita', 100);

            // SECTION 10: DATA TAMBAHAN
            $table->boolean('mempunyai_kip_pkh_kks')->default(false);
            $table->string('nomor_kartu_kesejahteraan', 100)->nullable();

            // SECTION 11: BERKAS PENDUKUNG (Isinya hanya teks nama file berkas)
            $table->string('file_kartu_keluarga', 150);
            $table->string('file_skl', 150);
            $table->string('file_bukti_spmb', 150);
            $table->string('file_surat_pernyataan', 150);

            // STATUS VERIFIKASI OLEH ADMIN
            $table->string('status_verifikasi', 30)->default('Proses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};