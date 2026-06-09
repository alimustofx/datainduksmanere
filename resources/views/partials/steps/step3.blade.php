<div class="space-y-6" x-data="dataAyahInduk()">
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">hail</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Isian Data Orang Tua:</span> Silakan lengkapi identitas Ayah Kandung sesuai dengan Kartu Keluarga (KK) atau Akta Kelahiran. Jika Ayah Kandung telah wafat, silakan isi data dasar lalu sesuaikan pilihan pada status hidup.
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nama Lengkap Ayah <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ayah_nama" 
                   value="{{ old('ayah_nama') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Nama Tanpa Gelar" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">NIK Ayah (16 Digit) <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ayah_nik" 
                   value="{{ old('ayah_nik') }}"
                   maxlength="16" 
                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                   placeholder="3507xxxxxxxxxxxx" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Status Keberadaan <span class="text-rose-600">*</span></label>
            <select name="ayah_status_hidup" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="Hidup" {{ old('ayah_status_hidup', 'Hidup') == 'Hidup' ? 'selected' : '' }}>Hidup</option>
                <option value="Meninggal" {{ old('ayah_status_hidup') == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Tempat Lahir Ayah <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ayah_tempat_lahir" 
                   value="{{ old('ayah_tempat_lahir') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Malang" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Tanggal Lahir Ayah <span class="text-rose-600">*</span></label>
            <input type="date" 
                   name="ayah_tanggal_lahir" 
                   value="{{ old('ayah_tanggal_lahir') }}"
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Kewarganegaraan <span class="text-rose-600">*</span></label>
            <select name="ayah_kewarganegaraan" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="Indonesia" {{ old('ayah_kewarganegaraan', 'Indonesia') == 'Indonesia' ? 'selected' : '' }}>Indonesia (WNI)</option>
                <option value="Asing" {{ old('ayah_kewarganegaraan') == 'Asing' ? 'selected' : '' }}>Asing (WNA)</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Agama Ayah <span class="text-rose-600">*</span></label>
            <select name="ayah_agama" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('ayah_agama') == '' ? 'selected' : '' }}>-- Pilih Agama --</option>
                <option value="Islam" {{ old('ayah_agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Kristen" {{ old('ayah_agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                <option value="Katolik" {{ old('ayah_agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Hindu" {{ old('ayah_agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Buddha" {{ old('ayah_agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                <option value="Khonghucu" {{ old('ayah_agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
            </select>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nomor HP / WhatsApp Ayah <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ayah_no_hp" 
                   value="{{ old('ayah_no_hp') }}"
                   oninput="this.value = this.value.replace(/[^0-9+]/g, '')" 
                   placeholder="Contoh: 0812xxxxxxxx" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Pendidikan Terakhir <span class="text-rose-600">*</span></label>
            <select name="ayah_pendidikan" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('ayah_pendidikan') == '' ? 'selected' : '' }}>-- Pilih Pendidikan --</option>
                <option value="Tidak Sekolah" {{ old('ayah_pendidikan') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah / Putus Sekolah</option>
                <option value="SD / Sederajat" {{ old('ayah_pendidikan') == 'SD / Sederajat' ? 'selected' : '' }}>SD / Sederajat</option>
                <option value="SMP / Sederajat" {{ old('ayah_pendidikan') == 'SMP / Sederajat' ? 'selected' : '' }}>SMP / Sederajat</option>
                <option value="SMA / Sederajat" {{ old('ayah_pendidikan') == 'SMA / Sederajat' ? 'selected' : '' }}>SMA / Sederajat</option>
                <option value="D1 / D2 / D3" {{ old('ayah_pendidikan') == 'D1 / D2 / D3' ? 'selected' : '' }}>D1 / D2 / D3</option>
                <option value="D4 / S1" {{ old('ayah_pendidikan') == 'D4 / S1' ? 'selected' : '' }}>D4 / S1</option>
                <option value="S2 / S3" {{ old('ayah_pendidikan') == 'S2 / S3' ? 'selected' : '' }}>S2 / S3</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Pekerjaan Utama <span class="text-rose-600">*</span></label>
            <select name="ayah_pekerjaan" 
                    x-model="pekerjaanAyah" 
                    class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('ayah_pekerjaan') == '' ? 'selected' : '' }}>-- Pilih Pekerjaan --</option>
                <option value="Tidak Bekerja" {{ old('ayah_pekerjaan') == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                <option value="PNS" {{ old('ayah_pekerjaan') == 'PNS' ? 'selected' : '' }}>PNS / ASN</option>
                <option value="TNI / Polri" {{ old('ayah_pekerjaan') == 'TNI / Polri' ? 'selected' : '' }}>TNI / Polri</option>
                <option value="Karyawan Swasta" {{ old('ayah_pekerjaan') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                <option value="Wiraswasta / Pedagang" {{ old('ayah_pekerjaan') == 'Wiraswasta / Pedagang' ? 'selected' : '' }}>Wiraswasta / Pedagang</option>
                <option value="Petani / Peternak" {{ old('ayah_pekerjaan') == 'Petani / Peternak' ? 'selected' : '' }}>Petani / Peternak</option>
                <option value="Buruh Harian" {{ old('ayah_pekerjaan') == 'Buruh Harian' ? 'selected' : '' }}>Buruh Harian</option>
                <option value="Lainnya" {{ old('ayah_pekerjaan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>
        
        <div class="space-y-2" x-show="pekerjaanAyah === 'Lainnya'" x-transition>
            <label class="block text-sm font-semibold text-rose-700">Sebutkan Pekerjaan Lainnya <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ayah_pekerjaan_lainnya" 
                   value="{{ old('ayah_pekerjaan_lainnya') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Pengemudi Online" 
                   class="w-full px-4 py-2.5 bg-surface border border-rose-300 rounded-lg focus:border-rose-600 focus:ring-1 focus:ring-rose-600 text-sm font-medium transition-all"
                   :required="pekerjaanAyah === 'Lainnya'">
        </div>

        <div class="space-y-2" :class="pekerjaanAyah !== 'Lainnya' ? 'md:col-span-2' : ''">
            <label class="block text-sm font-semibold text-on-surface">Rata-rata Penghasilan / Bulan <span class="text-rose-600">*</span></label>
            <select name="ayah_penghasilan" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('ayah_penghasilan') == '' ? 'selected' : '' }}>-- Pilih Rentang Penghasilan --</option>
                <option value="Tidak Berpenghasilan" {{ old('ayah_penghasilan') == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan / Kurang dari Rp 500.000</option>
                <option value="Rp 500.000 - Rp 1.000.000" {{ old('ayah_penghasilan') == 'Rp 500.000 - Rp 1.000.000' ? 'selected' : '' }}>Rp 500.000 - Rp 1.000.000</option>
                <option value="Rp 1.000.000 - Rp 2.000.000" {{ old('ayah_penghasilan') == 'Rp 1.000.000 - Rp 2.000.000' ? 'selected' : '' }}>Rp 1.000.000 - Rp 2.000.000</option>
                <option value="Rp 2.000.000 - Rp 5.000.000" {{ old('ayah_penghasilan') == 'Rp 2.000.000 - Rp 5.000.000' ? 'selected' : '' }}>Rp 2.000.000 - Rp 5.000.000</option>
                <option value="Rp 5.000.000 - Rp 10.000.000" {{ old('ayah_penghasilan') == 'Rp 5.000.000 - Rp 10.000.000' ? 'selected' : '' }}>Rp 5.000.000 - Rp 10.000.000</option>
                <option value="Lebih dari Rp 10.000.000" {{ old('ayah_penghasilan') == 'Lebih dari Rp 10.000.000' ? 'selected' : '' }}>Lebih dari Rp 10.000.000</option>
            </select>
        </div>
    </div>

    <div class="pt-4 border-t border-outline-variant/60">
        <h3 class="text-sm font-bold text-primary tracking-wide uppercase mb-4">Alamat Domisili Ayah Kandung</h3>
        
        <div class="space-y-2 mb-6">
            <label class="block text-sm font-semibold text-on-surface">Alamat Jalan / Dusun <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ayah_alamat_jalan" 
                   value="{{ old('ayah_alamat_jalan') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Jl. Pahlawan No. 42 Blok B" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">RT <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ayah_rt" 
                       value="{{ old('ayah_rt') }}"
                       maxlength="3" 
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                       onblur="if(this.value !== '') this.value = this.value.padStart(3, '0')"
                       placeholder="001" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm text-center font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">RW <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ayah_rw" 
                       value="{{ old('ayah_rw') }}"
                       maxlength="3" 
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                       onblur="if(this.value !== '') this.value = this.value.padStart(3, '0')"
                       placeholder="002" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm text-center font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Desa / Kelurahan <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ayah_desa_kelurahan" 
                       value="{{ old('ayah_desa_kelurahan') }}"
                       oninput="this.value = toProperCase(this.value)" 
                   placeholder="Kedok" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Kecamatan <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ayah_kecamatan" 
                       value="{{ old('ayah_kecamatan') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Turen" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                       required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Kabupaten / Kota <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ayah_kabupaten_kota" 
                       value="{{ old('ayah_kabupaten_kota') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Kabupaten Malang" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Provinsi <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ayah_provinsi" 
                       value="{{ old('ayah_provinsi') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Jawa Timur" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Kode Pos (5 Digit) <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ayah_kode_pos" 
                       value="{{ old('ayah_kode_pos') }}"
                       maxlength="5" 
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                       placeholder="65175" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                       required>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * Engine Komponen Data Ayah (Alpine.js) + Sinkronisasi Session Laravel Old
     */
    function dataAyahInduk() {
        return {
            pekerjaanAyah: '{{ old("ayah_pekerjaan", "") }}',
        }
    }
</script>