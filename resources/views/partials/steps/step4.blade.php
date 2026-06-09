<div class="space-y-6" x-data="dataIbuInduk()">
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">elderly</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Isian Data Orang Tua:</span> Silakan lengkapi identitas Ibu Kandung sesuai dengan Kartu Keluarga (KK) atau Akta Kelahiran. Jika Ibu Kandung telah wafat, silakan isi data dasar lalu sesuaikan pilihan pada status hidup.
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nama Lengkap Ibu <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ibu_nama" 
                   value="{{ old('ibu_nama') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Nama Tanpa Gelar" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">NIK Ibu (16 Digit) <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ibu_nik" 
                   value="{{ old('ibu_nik') }}"
                   maxlength="16" 
                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                   placeholder="3507xxxxxxxxxxxx" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Status Keberadaan <span class="text-rose-600">*</span></label>
            <select name="ibu_status_hidup" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="Hidup" {{ old('ibu_status_hidup', 'Hidup') == 'Hidup' ? 'selected' : '' }}>Hidup</option>
                <option value="Meninggal" {{ old('ibu_status_hidup') == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Tempat Lahir Ibu <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ibu_tempat_lahir" 
                   value="{{ old('ibu_tempat_lahir') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Malang" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Tanggal Lahir Ibu <span class="text-rose-600">*</span></label>
            <input type="date" 
                   name="ibu_tanggal_lahir" 
                   value="{{ old('ibu_tanggal_lahir') }}"
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Kewarganegaraan <span class="text-rose-600">*</span></label>
            <select name="ibu_kewarganegaraan" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="Indonesia" {{ old('ibu_kewarganegaraan', 'Indonesia') == 'Indonesia' ? 'selected' : '' }}>Indonesia (WNI)</option>
                <option value="Asing" {{ old('ibu_kewarganegaraan') == 'Asing' ? 'selected' : '' }}>Asing (WNA)</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Agama Ibu <span class="text-rose-600">*</span></label>
            <select name="ibu_agama" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('ibu_agama') == '' ? 'selected' : '' }}>-- Pilih Agama --</option>
                <option value="Islam" {{ old('ibu_agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Kristen" {{ old('ibu_agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                <option value="Katolik" {{ old('ibu_agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Hindu" {{ old('ibu_agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Buddha" {{ old('ibu_agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                <option value="Khonghucu" {{ old('ibu_agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
            </select>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nomor HP / WhatsApp Ibu <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ibu_no_hp" 
                   value="{{ old('ibu_no_hp') }}"
                   oninput="this.value = this.value.replace(/[^0-9+]/g, '')" 
                   placeholder="Contoh: 0857xxxxxxxx" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Pendidikan Terakhir <span class="text-rose-600">*</span></label>
            <select name="ibu_pendidikan" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('ibu_pendidikan') == '' ? 'selected' : '' }}>-- Pilih Pendidikan --</option>
                <option value="Tidak Sekolah" {{ old('ibu_pendidikan') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah / Putus Sekolah</option>
                <option value="SD / Sederajat" {{ old('ibu_pendidikan') == 'SD / Sederajat' ? 'selected' : '' }}>SD / Sederajat</option>
                <option value="SMP / Sederajat" {{ old('ibu_pendidikan') == 'SMP / Sederajat' ? 'selected' : '' }}>SMP / Sederajat</option>
                <option value="SMA / Sederajat" {{ old('ibu_pendidikan') == 'SMA / Sederajat' ? 'selected' : '' }}>SMA / Sederajat</option>
                <option value="D1 / D2 / D3" {{ old('ibu_pendidikan') == 'D1 / D2 / D3' ? 'selected' : '' }}>D1 / D2 / D3</option>
                <option value="D4 / S1" {{ old('ibu_pendidikan') == 'D4 / S1' ? 'selected' : '' }}>D4 / S1</option>
                <option value="S2 / S3" {{ old('ibu_pendidikan') == 'S2 / S3' ? 'selected' : '' }}>S2 / S3</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Pekerjaan Utama <span class="text-rose-600">*</span></label>
            <select name="ibu_pekerjaan" 
                    x-model="pekerjaanIbu" 
                    class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                    required>
                <option value="" disabled {{ old('ibu_pekerjaan') == '' ? 'selected' : '' }}>-- Pilih Pekerjaan --</option>
                <option value="Ibu Rumah Tangga" {{ old('ibu_pekerjaan') == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu Rumah Tangga (IRT)</option>
                <option value="PNS" {{ old('ibu_pekerjaan') == 'PNS' ? 'selected' : '' }}>PNS / ASN</option>
                <option value="Karyawan Swasta" {{ old('ibu_pekerjaan') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                <option value="Wiraswasta / Pedagang" {{ old('ibu_pekerjaan') == 'Wiraswasta / Pedagang' ? 'selected' : '' }}>Wiraswasta / Pedagang</option>
                <option value="Petani / Peternak" {{ old('ibu_pekerjaan') == 'Petani / Peternak' ? 'selected' : '' }}>Petani / Peternak</option>
                <option value="Buruh Harian" {{ old('ibu_pekerjaan') == 'Buruh Harian' ? 'selected' : '' }}>Buruh Harian</option>
                <option value="Lainnya" {{ old('ibu_pekerjaan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>
        
        <div class="space-y-2" x-show="pekerjaanIbu === 'Lainnya'" x-transition>
            <label class="block text-sm font-semibold text-rose-700">Sebutkan Pekerjaan Lainnya <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ibu_pekerjaan_lainnya" 
                   value="{{ old('ibu_pekerjaan_lainnya') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Penjahit Mandiri" 
                   class="w-full px-4 py-2.5 bg-surface border border-rose-300 rounded-lg focus:border-rose-600 focus:ring-1 focus:ring-rose-600 text-sm font-medium transition-all"
                   :required="pekerjaanIbu === 'Lainnya'">
        </div>

        <div class="space-y-2" :class="pekerjaanIbu !== 'Lainnya' ? 'md:col-span-2' : ''">
            <label class="block text-sm font-semibold text-on-surface">Rata-rata Penghasilan / Bulan <span class="text-rose-600">*</span></label>
            <select name="ibu_penghasilan" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('ibu_penghasilan') == '' ? 'selected' : '' }}>-- Pilih Rentang Penghasilan --</option>
                <option value="Tidak Berpenghasilan" {{ old('ibu_penghasilan') == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan / Kurang dari Rp 500.000</option>
                <option value="Rp 500.000 - Rp 1.000.000" {{ old('ibu_penghasilan') == 'Rp 500.000 - Rp 1.000.000' ? 'selected' : '' }}>Rp 500.000 - Rp 1.000.000</option>
                <option value="Rp 1.000.000 - Rp 2.000.000" {{ old('ibu_penghasilan') == 'Rp 1.000.000 - Rp 2.000.000' ? 'selected' : '' }}>Rp 1.000.000 - Rp 2.000.000</option>
                <option value="Rp 2.000.000 - Rp 5.000.000" {{ old('ibu_penghasilan') == 'Rp 2.000.000 - Rp 5.000.000' ? 'selected' : '' }}>Rp 2.000.000 - Rp 5.000.000</option>
                <option value="Rp 5.000.000 - Rp 10.000.000" {{ old('ibu_penghasilan') == 'Rp 5.000.000 - Rp 10.000.000' ? 'selected' : '' }}>Rp 5.000.000 - Rp 10.000.000</option>
                <option value="Lebih dari Rp 10.000.000" {{ old('ibu_penghasilan') == 'Lebih dari Rp 10.000.000' ? 'selected' : '' }}>Lebih dari Rp 10.000.000</option>
            </select>
        </div>
    </div>

    <div class="pt-4 border-t border-outline-variant/60">
        <h3 class="text-sm font-bold text-primary tracking-wide uppercase mb-4">Alamat Domisili Ibu Kandung</h3>
        
        <div class="space-y-2 mb-6">
            <label class="block text-sm font-semibold text-on-surface">Alamat Jalan / Dusun <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="ibu_alamat_jalan" 
                   value="{{ old('ibu_alamat_jalan') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Jl. Raya Kedok No. 15" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                   required>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">RT <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ibu_rt" 
                       value="{{ old('ibu_rt') }}"
                       maxlength="3" 
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                       onblur="if(this.value !== '') this.value = this.value.padStart(3, '0')"
                       placeholder="004" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm text-center font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">RW <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ibu_rw" 
                       value="{{ old('ibu_rw') }}"
                       maxlength="3" 
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                       onblur="if(this.value !== '') this.value = this.value.padStart(3, '0')"
                       placeholder="001" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm text-center font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Desa / Kelurahan <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ibu_desa_kelurahan" 
                       value="{{ old('ibu_desa_kelurahan') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Kedok" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Kecamatan <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ibu_kecamatan" 
                       value="{{ old('ibu_kecamatan') }}"
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
                       name="ibu_kabupaten_kota" 
                       value="{{ old('ibu_kabupaten_kota') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Kabupaten Malang" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Provinsi <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ibu_provinsi" 
                       value="{{ old('ibu_provinsi') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Jawa Timur" 
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium"
                       required>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Kode Pos (5 Digit) <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="ibu_kode_pos" 
                       value="{{ old('ibu_kode_pos') }}"
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
     * Engine Komponen Data Ibu (Alpine.js) + Sinkronisasi Session Laravel Old
     */
    function dataIbuInduk() {
        return {
            pekerjaanIbu: '{{ old("ibu_pekerjaan", "") }}',
        }
    }
</script>