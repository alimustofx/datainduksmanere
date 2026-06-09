<div class="space-y-6" x-data="dataDomisiliSiswa()">
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">home_pin</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Isian Alamat Domisili Siswa:</span> Silakan masukkan alamat lengkap tempat tinggal Anda saat ini. Jika alamat tinggal Anda sama persis dengan orang tua, Anda dapat menggunakan tombol pintasan di bawah untuk menyalin alamat secara otomatis.
        </div>
    </div>

    <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 space-y-3">
        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Pintasan Pengisian Alamat:</span>
        <div class="flex flex-wrap gap-3">
            <button type="button" 
                    @click="salinAlamatOrangTua('ibu')"
                    class="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-outline-variant hover:border-primary hover:text-primary rounded-lg text-xs font-semibold shadow-sm transition-all text-on-surface-variant">
                <span class="material-symbols-outlined text-[16px]">content_copy</span>
                Sama dengan Alamat Ibu
            </button>
            <button type="button" 
                    @click="salinAlamatOrangTua('ayah')"
                    class="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-outline-variant hover:border-primary hover:text-primary rounded-lg text-xs font-semibold shadow-sm transition-all text-on-surface-variant">
                <span class="material-symbols-outlined text-[16px]">content_copy</span>
                Sama dengan Alamat Ayah
            </button>
        </div>
    </div>

    <div class="space-y-2">
        <label class="block text-sm font-semibold text-on-surface">Alamat Jalan / Dusun Tempat Tinggal Siswa <span class="text-rose-600">*</span></label>
        <input type="text" 
               name="siswa_alamat_jalan" 
               x-model="alamatJalan"
               oninput="this.value = toProperCase(this.value)" 
               placeholder="Contoh: Jl. Diponegoro No. 17 RT. 03 RW. 01 Dusun Krajan" 
               class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
               required>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">RT <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="siswa_rt" 
                   maxlength="3" 
                   x-model="rt"
                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                   placeholder="003" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm text-center font-medium"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">RW <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="siswa_rw" 
                   maxlength="3" 
                   x-model="rw"
                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                   placeholder="001" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm text-center font-medium"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Desa / Kelurahan <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="siswa_desa_kelurahan" 
                   x-model="desa"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Turen" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Kecamatan <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="siswa_kecamatan" 
                   x-model="kecamatan"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Turen" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                   required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Kabupaten / Kota <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="siswa_kabupaten_kota" 
                   x-model="kabupaten"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Kab. Malang" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Provinsi <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="siswa_provinsi" 
                   x-model="provinsi"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Jawa Timur" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Kode Pos (5 Digit) <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="siswa_kode_pos" 
                   maxlength="5" 
                   x-model="kodePos"
                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                   placeholder="65175" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                   required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-outline-variant/60">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Status Kepemilikan Rumah / Tinggal Bersama <span class="text-rose-600">*</span></label>
            <select name="siswa_tinggal_bersama" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('siswa_tinggal_bersama') == '' ? 'selected' : '' }}>-- Pilih Status --</option>
                <option value="Orang Tua" {{ old('siswa_tinggal_bersama') == 'Orang Tua' ? 'selected' : '' }}>Tinggal Bersama Orang Tua Kandung</option>
                <option value="Wali / Saudara" {{ old('siswa_tinggal_bersama') == 'Wali / Saudara' ? 'selected' : '' }}>Tinggal Bersama Wali / Saudara</option>
                <option value="Asrama / Pondok" {{ old('siswa_tinggal_bersama') == 'Asrama / Pondok' ? 'selected' : '' }}>Tinggal di Asrama / Pondok Pesantren</option>
                <option value="Kos / Kontrak" {{ old('siswa_tinggal_bersama') == 'Kos / Kontrak' ? 'selected' : '' }}>Indekos / Mengontrak Sendiri</option>
                <option value="Panti Asuhan" {{ old('siswa_tinggal_bersama') == 'Panti Asuhan' ? 'selected' : '' }}>Panti Asuhan</option>
            </select>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Jarak Tempat Tinggal ke Sekolah <span class="text-rose-600">*</span></label>
            <select name="siswa_jarak_sekolah" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('siswa_jarak_sekolah') == '' ? 'selected' : '' }}>-- Pilih Estimasi Jarak --</option>
                <option value="Kurang dari 1 KM" {{ old('siswa_jarak_sekolah') == 'Kurang dari 1 KM' ? 'selected' : '' }}>Kurang dari 1 KM (Sangat Dekat)</option>
                <option value="1 KM - 3 KM" {{ old('siswa_jarak_sekolah') == '1 KM - 3 KM' ? 'selected' : '' }}>1 KM sampai 3 KM</option>
                <option value="3 KM - 5 KM" {{ old('siswa_jarak_sekolah') == '3 KM - 5 KM' ? 'selected' : '' }}>3 KM sampai 5 KM</option>
                <option value="5 KM - 10 KM" {{ old('siswa_jarak_sekolah') == '5 KM - 10 KM' ? 'selected' : '' }}>5 KM sampai 10 KM</option>
                <option value="Lebih dari 10 KM" {{ old('siswa_jarak_sekolah') == 'Lebih dari 10 KM' ? 'selected' : '' }}>Lebih dari 10 KM (Jauh)</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Moda Transportasi Menuju Sekolah <span class="text-rose-600">*</span></label>
            <select name="siswa_transportasi" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('siswa_transportasi') == '' ? 'selected' : '' }}>-- Pilih Alat Transportasi Utama --</option>
                <option value="Jalan Kaki" {{ old('siswa_transportasi') == 'Jalan Kaki' ? 'selected' : '' }}>Jalan Kaki</option>
                <option value="Sepeda Onthel" {{ old('siswa_transportasi') == 'Sepeda Onthel' ? 'selected' : '' }}>Sepeda Onthel</option>
                <option value="Sepeda Motor" {{ old('siswa_transportasi') == 'Sepeda Motor' ? 'selected' : '' }}>Sepeda Motor Sendiri / Bersama Teman</option>
                <option value="Antar Jemput Orang Tua" {{ old('siswa_transportasi') == 'Antar Jemput Orang Tua' ? 'selected' : '' }}>Diantar Jemput Orang Tua / Wali</option>
                <option value="Angkutan Umum" {{ old('siswa_transportasi') == 'Angkutan Umum' ? 'selected' : '' }}>Angkutan Umum / Angkot / Bus Sekolah</option>
                <option value="Ojek Online" {{ old('siswa_transportasi') == 'Ojek Online' ? 'selected' : '' }}>Ojek Online (Gojek / Grab / Maxim)</option>
                <option value="Kereta Api" {{ old('siswa_transportasi') == 'Kereta Api' ? 'selected' : '' }}>Kereta Api (Komuter)</option>
            </select>
        </div>
    </div>
</div>

<script>
    /**
     * Manajemen State Alamat Domisili Siswa (Alpine.js) + Sinkronisasi Session Laravel Old
     */
    function dataDomisiliSiswa() {
        return {
            alamatJalan: '{{ old("siswa_alamat_jalan", "") }}',
            rt: '{{ old("siswa_rt", "") }}',
            rw: '{{ old("siswa_rw", "") }}',
            desa: '{{ old("siswa_desa_kelurahan", "") }}',
            kecamatan: '{{ old("siswa_kecamatan", "") }}',
            kabupaten: '{{ old("siswa_kabupaten_kota", "") }}',
            provinsi: '{{ old("siswa_provinsi", "") }}',
            kodePos: '{{ old("siswa_kode_pos", "") }}',
            
            /**
             * Fungsi Pintar: Mengambil value langsung dari input form target secara real-time
             */
            salinAlamatOrangTua(tipe) {
                // Cari elemen input di halaman master form berdasarkan nama field pembentuk alamat
                let targetJalan = document.querySelector(`input[name="${tipe}_alamat_jalan"]`);
                let targetRt = document.querySelector(`input[name="${tipe}_rt"]`);
                let targetRw = document.querySelector(`input[name="${tipe}_rw"]`);
                let targetDesa = document.querySelector(`input[name="${tipe}_desa_kelurahan"]`);
                let targetKec = document.querySelector(`input[name="${tipe}_kecamatan"]`);
                let targetKab = document.querySelector(`input[name="${tipe}_kabupaten_kota"]`);
                let targetProv = document.querySelector(`input[name="${tipe}_provinsi"]`);
                let targetPos = document.querySelector(`input[name="${tipe}_kode_pos"]`);

                // Jika elemen ditemukan dan memiliki isian, langsung mapping ke state internal domisili siswa
                this.alamatJalan = targetJalan ? targetJalan.value : '';
                this.rt = targetRt ? targetRt.value : '';
                this.rw = targetRw ? targetRw.value : '';
                this.desa = targetDesa ? targetDesa.value : '';
                this.kecamatan = targetKec ? targetKec.value : '';
                this.kabupaten = targetKab ? targetKab.value : '';
                this.provinsi = targetProv ? targetProv.value : '';
                this.kodePos = targetPos ? targetPos.value : '';
            }
        }
    }
</script>