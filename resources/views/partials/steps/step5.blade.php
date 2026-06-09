<div class="space-y-6" x-data="dataWaliInduk()">
    <!-- Panel Opsi Pilihan Wali -->
    <div class="bg-surface-container-low border border-outline-variant/80 rounded-xl p-5 space-y-4">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-primary text-[24px]">supervised_user_circle</span>
            <div class="space-y-1">
                <label class="block text-sm font-bold text-on-surface uppercase tracking-wide">Konfirmasi Keberadaan Wali</label>
                <p class="text-xs text-on-surface-variant leading-relaxed">
                    Wali adalah orang dewasa yang bertanggung jawab atas diri Anda secara legal di luar Orang Tua Kandung (contoh: Kakek, Nenek, Paman, Bibi, atau Kakak Kandung yang sudah berpenghasilan).
                </p>
            </div>
        </div>

        <!-- Pilihan Radio Button -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
            <label class="flex items-center gap-3 p-3 bg-surface border rounded-xl cursor-pointer transition-all select-none"
                   :class="statusWali === '0' ? 'border-primary ring-1 ring-primary bg-primary/5' : 'border-outline-variant hover:bg-slate-50'">
                <input type="radio" 
                       name="status_keberadaan_wali" 
                       value="0" 
                       x-model="statusWali"
                       class="w-4 h-4 text-primary focus:ring-primary">
                <div class="text-sm">
                    <span class="block font-bold text-on-surface">Tidak Memiliki Wali</span>
                    <span class="text-xs text-outline">Saya tinggal bersama Orang Tua Kandung (Bisa langsung lanjut)</span>
                </div>
            </label>

            <label class="flex items-center gap-3 p-3 bg-surface border rounded-xl cursor-pointer transition-all select-none"
                   :class="statusWali === '1' ? 'border-primary ring-1 ring-primary bg-primary/5' : 'border-outline-variant hover:bg-slate-50'">
                <input type="radio" 
                       name="status_keberadaan_wali" 
                       value="1" 
                       x-model="statusWali"
                       class="w-4 h-4 text-primary focus:ring-primary">
                <div class="text-sm">
                    <span class="block font-bold text-on-surface">Memiliki Wali</span>
                    <span class="text-xs text-outline">Saya tinggal bersama keluarga pengganti / asrama / indekos</span>
                </div>
            </label>
        </div>
    </div>

    <!-- FORM ISIAN WALI -->
    <div class="space-y-6" x-show="statusWali === '1'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2">
        
        <div class="bg-amber-50 border border-amber-200 text-amber-900 rounded-xl p-4 flex items-start gap-3">
            <span class="material-symbols-outlined text-amber-700 text-[22px] mt-0.5">warning</span>
            <div class="text-sm leading-relaxed">
                <span class="font-bold">Perhatian:</span> Karena Anda memilih memiliki wali, seluruh kolom di bawah ini menjadi <span class="font-bold text-rose-700">Wajib Diisi</span> untuk kebutuhan darurat sekolah.
            </div>
        </div>

        <!-- Baris 1: Nama, NIK, Hubungan Keluarga -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Nama Lengkap Wali <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="wali_nama" 
                       value="{{ old('wali_nama') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Nama Wali Sesuai KTP" 
                       :required="statusWali === '1'"
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">NIK Wali (16 Digit) <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="wali_nik" 
                       value="{{ old('wali_nik') }}"
                       maxlength="16" 
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                       placeholder="3507xxxxxxxxxxxx" 
                       :required="statusWali === '1'"
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Hubungan dengan Siswa <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="wali_hubungan" 
                       value="{{ old('wali_hubungan') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Contoh: Kakek / Paman / Kakak Kandung" 
                       :required="statusWali === '1'"
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
            </div>
        </div>

        <!-- Baris 2: Tempat Lahir, Tanggal Lahir, Agama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Tempat Lahir Wali <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="wali_tempat_lahir" 
                       value="{{ old('wali_tempat_lahir') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Contoh: Malang" 
                       :required="statusWali === '1'"
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Tanggal Lahir Wali <span class="text-rose-600">*</span></label>
                <input type="date" 
                       value="{{ old('wali_tanggal_lahir') }}"
                       :required="statusWali === '1'"
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                       name="wali_tanggal_lahir">
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Agama Wali <span class="text-rose-600">*</span></label>
                <select name="wali_agama" :required="statusWali === '1'" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
                    <option value="" disabled {{ old('wali_agama') == '' ? 'selected' : '' }}>-- Pilih Agama --</option>
                    <option value="Islam" {{ old('wali_agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('wali_agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('wali_agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('wali_agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('wali_agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Khonghucu" {{ old('wali_agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                </select>
            </div>
        </div>

        <!-- Baris 3: No HP, Pendidikan, Penghasilan -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Nomor HP / WhatsApp Wali <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="wali_no_hp" 
                       value="{{ old('wali_no_hp') }}"
                       oninput="this.value = this.value.replace(/[^0-9+]/g, '')" 
                       placeholder="Contoh: 0812xxxxxxxx" 
                       :required="statusWali === '1'"
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Pendidikan Terakhir <span class="text-rose-600">*</span></label>
                <select name="wali_pendidikan" :required="statusWali === '1'" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
                    <option value="" disabled {{ old('wali_pendidikan') == '' ? 'selected' : '' }}>-- Pilih Pendidikan --</option>
                    <option value="SD / Sederajat" {{ old('wali_pendidikan') == 'SD / Sederajat' ? 'selected' : '' }}>SD / Sederajat</option>
                    <option value="SMP / Sederajat" {{ old('wali_pendidikan') == 'SMP / Sederajat' ? 'selected' : '' }}>SMP / Sederajat</option>
                    <option value="SMA / Sederajat" {{ old('wali_pendidikan') == 'SMA / Sederajat' ? 'selected' : '' }}>SMA / Sederajat</option>
                    <option value="Diploma (D1/D2/D3)" {{ old('wali_pendidikan') == 'Diploma (D1/D2/D3)' ? 'selected' : '' }}>Diploma (D1/D2/D3)</option>
                    <option value="Sarjana (S1/D4)" {{ old('wali_pendidikan') == 'Sarjana (S1/D4)' ? 'selected' : '' }}>Sarjana (S1/D4)</option>
                    <option value="Pascasarjana (S2/S3)" {{ old('wali_pendidikan') == 'Pascasarjana (S2/S3)' ? 'selected' : '' }}>Pascasarjana (S2/S3)</option>
                </select>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Rata-rata Penghasilan / Bulan <span class="text-rose-600">*</span></label>
                <select name="wali_penghasilan" :required="statusWali === '1'" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
                    <option value="" disabled {{ old('wali_penghasilan') == '' ? 'selected' : '' }}>-- Pilih Rentang Penghasilan --</option>
                    <option value="Kurang dari Rp 1.000.000" {{ old('wali_penghasilan') == 'Kurang dari Rp 1.000.000' ? 'selected' : '' }}>Kurang dari Rp 1.000.000</option>
                    <option value="Rp 1.000.000 - Rp 3.000.000" {{ old('wali_penghasilan') == 'Rp 1.000.000 - Rp 3.000.000' ? 'selected' : '' }}>Rp 1.000.000 - Rp 3.000.000</option>
                    <option value="Rp 3.000.000 - Rp 5.000.000" {{ old('wali_penghasilan') == 'Rp 3.000.000 - Rp 5.000.000' ? 'selected' : '' }}>Rp 3.000.000 - Rp 5.000.000</option>
                    <option value="Lebih dari Rp 5.000.000" {{ old('wali_penghasilan') == 'Lebih dari Rp 5.000.000' ? 'selected' : '' }}>Lebih dari Rp 5.000.000</option>
                </select>
            </div>
        </div>

        <!-- Baris 4: Pekerjaan & Pekerjaan Lainnya -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-on-surface">Pekerjaan Utama <span class="text-rose-600">*</span></label>
                <select name="wali_pekerjaan" 
                        x-model="pekerjaanWali" 
                        :required="statusWali === '1'"
                        class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
                    <option value="" disabled {{ old('wali_pekerjaan') == '' ? 'selected' : '' }}>-- Pilih Pekerjaan --</option>
                    <option value="PNS / TNI / Polri" {{ old('wali_pekerjaan') == 'PNS / TNI / Polri' ? 'selected' : '' }}>PNS / TNI / Polri</option>
                    <option value="Karyawan Swasta" {{ old('wali_pekerjaan') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                    <option value="Wiraswasta" {{ old('wali_pekerjaan') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta / Pedagang</option>
                    <option value="Petani / Buruh" {{ old('wali_pekerjaan') == 'Petani / Buruh' ? 'selected' : '' }}>Petani / Buruh</option>
                    <option value="Pensiunan" {{ old('wali_pekerjaan') == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                    <option value="Lainnya" {{ old('wali_pekerjaan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
            
            <div class="space-y-2" x-show="pekerjaanWali === 'Lainnya'" x-transition>
                <label class="block text-sm font-semibold text-rose-700">Sebutkan Pekerjaan Lainnya <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="wali_pekerjaan_lainnya" 
                       value="{{ old('wali_pekerjaan_lainnya') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Contoh: Pengemudi Angkutan Umum" 
                       :required="statusWali === '1' && pekerjaanWali === 'Lainnya'"
                       class="w-full px-4 py-2.5 bg-surface border border-rose-300 rounded-lg focus:border-rose-600 focus:ring-1 focus:ring-rose-600 text-sm font-medium transition-all">
            </div>
        </div>

        <!-- Bagian Alamat Domisili Wali -->
        <div class="pt-4 border-t border-outline-variant/60">
            <h3 class="text-sm font-bold text-primary tracking-wide uppercase mb-4">Alamat Tempat Tinggal Wali</h3>
            
            <div class="space-y-2 mb-6">
                <label class="block text-sm font-semibold text-on-surface">Alamat Jalan / Dusun <span class="text-rose-600">*</span></label>
                <input type="text" 
                       name="wali_alamat_jalan" 
                       value="{{ old('wali_alamat_jalan') }}"
                       oninput="this.value = toProperCase(this.value)" 
                       placeholder="Contoh: Jl. Gatot Subroto No. 12" 
                       :required="statusWali === '1'"
                       class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium">
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface">RT <span class="text-rose-600">*</span></label>
                    <input type="text" 
                           name="wali_rt" 
                           value="{{ old('wali_rt') }}"
                           maxlength="3" 
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                           onblur="if(this.value !== '') this.value = this.value.padStart(3, '0')"
                           placeholder="001" 
                           :required="statusWali === '1'"
                           class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm text-center font-medium">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface">RW <span class="text-rose-600">*</span></label>
                    <input type="text" 
                           name="wali_rw" 
                           value="{{ old('wali_rw') }}"
                           maxlength="3" 
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                           onblur="if(this.value !== '') this.value = this.value.padStart(3, '0')"
                           placeholder="005" 
                           :required="statusWali === '1'"
                           class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm text-center font-medium">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface">Desa / Kelurahan <span class="text-rose-600">*</span></label>
                    <input type="text" 
                           name="wali_desa_kelurahan" 
                           value="{{ old('wali_desa_kelurahan') }}"
                           oninput="this.value = toProperCase(this.value)" 
                           placeholder="Turen" 
                           :required="statusWali === '1'"
                           class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface">Kecamatan <span class="text-rose-600">*</span></label>
                    <input type="text" 
                           name="wali_kecamatan" 
                           value="{{ old('wali_kecamatan') }}"
                           oninput="this.value = toProperCase(this.value)" 
                           placeholder="Turen" 
                           :required="statusWali === '1'"
                           class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface">Kabupaten / Kota <span class="text-rose-600">*</span></label>
                    <input type="text" 
                           name="wali_kabupaten_kota" 
                           value="{{ old('wali_kabupaten_kota') }}"
                           oninput="this.value = toProperCase(this.value)" 
                           placeholder="Kab. Malang" 
                           :required="statusWali === '1'"
                           class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface">Provinsi <span class="text-rose-600">*</span></label>
                    <input type="text" 
                           name="wali_provinsi" 
                           value="{{ old('wali_provinsi') }}"
                           oninput="this.value = toProperCase(this.value)" 
                           placeholder="Jawa Timur" 
                           :required="statusWali === '1'"
                           class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface">Kode Pos <span class="text-rose-600">*</span></label>
                    <input type="text" 
                           name="wali_kode_pos" 
                           value="{{ old('wali_kode_pos') }}"
                           maxlength="5" 
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                           placeholder="65175" 
                           :required="statusWali === '1'"
                           class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg text-sm font-medium">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * Engine Komponen Data Wali (Alpine.js) + Sinkronisasi Session Laravel Old
     */
    function dataWaliInduk() {
        return {
            statusWali: '{{ old("status_keberadaan_wali", "0") }}',
            pekerjaanWali: '{{ old("wali_pekerjaan", "") }}',
        }
    }
</script>