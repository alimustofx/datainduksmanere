<div class="space-y-6">
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">account_box</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Isian Data Buku Induk:</span> Silakan lengkapi identitas pribadi Anda dengan sebenar-benarnya sesuai dengan Akta Kelahiran dan Kartu Keluarga (KK) resmi yang berlaku. Format teks akan otomatis menyesuaikan ke huruf kapital di awal kata (Proper Case).
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nama Lengkap Siswa <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="nama_lengkap" 
                   value="{{ old('nama_lengkap') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Sesuai Akta Kelahiran / Ijazah" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nama Panggilan <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="nama_panggilan" 
                   value="{{ old('nama_panggilan') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Budi" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Jenis Kelamin <span class="text-rose-600">*</span></label>
            <select name="jenis_kelamin" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('jenis_kelamin') == '' ? 'selected' : '' }}>-- Pilih --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Email Aktif <span class="text-rose-600">*</span></label>
            <input type="email" 
                   name="email" 
                   value="{{ old('email') }}"
                   placeholder="alamat@email.com" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nomor HP Aktif (WhatsApp) <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="no_hp" 
                   value="{{ old('no_hp') }}"
                   oninput="this.value = this.value.replace(/[^0-9+]/g, '')" 
                   placeholder="08xxxxxxxxxx" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Tempat Lahir <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="tempat_lahir" 
                   value="{{ old('tempat_lahir') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Malang" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Tanggal Lahir <span class="text-rose-600">*</span></label>
            <input type="date" 
                   name="tanggal_lahir" 
                   value="{{ old('tanggal_lahir') }}"
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">NIK (No. Induk Kependudukan) <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="nik" 
                   value="{{ old('nik') }}"
                   maxlength="16" 
                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                   placeholder="16 Digit Nomor KTP/KK" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
            <p class="text-[11px] text-on-surface-variant/70 leading-relaxed mt-1">
                Pastikan memasukkan 16 digit NIK <span class="font-bold text-on-surface">Calon Siswa</span> yang tertera di lembar Kartu Keluarga, bukan NIK Orang Tua/Wali.
            </p>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nomor Kartu Keluarga (KK) <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="no_kk" 
                   value="{{ old('no_kk') }}"
                   maxlength="16" 
                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                   placeholder="16 Digit Nomor KK" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
            <p class="text-[11px] text-on-surface-variant/70 leading-relaxed mt-1">
                Masukkan 16 digit Nomor KK yang terletak di bagian <span class="font-bold text-on-surface">Paling Atas</span> dokumen Kartu Keluarga (berwarna hitam besar).
            </p>
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">No Akta Kelahiran <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="no_akta_kelahiran" 
                   value="{{ old('no_akta_kelahiran') }}"
                   oninput="this.value = this.value.toUpperCase()" 
                   placeholder="Contoh: 3507-LU-XXXXXXXX" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
            <p class="text-[11px] text-on-surface-variant/70 leading-relaxed mt-1">
                <span class="text-amber-600 font-bold">PENTING:</span> Masukkan nomor setelah kalimat <span class="font-bold text-on-surface">"Berdasarkan Akta Kelahiran Nomor..."</span>. Bukan nomor registrasi di pojok kanan atas.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">NPSN Sekolah Asal (SMP/MTs) <span class="text-rose-600">*</span></label>
            <input type="text" 
                   id="npsn_smp"
                   name="npsn_smp" 
                   value="{{ old('npsn_smp') }}"
                   maxlength="8" 
                   oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.length === 8) { jalankanCariSekolah(this.value); } else { document.getElementById('nama_smp').value = ''; }" 
                   placeholder="8 Digit NPSN" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nama Sekolah Asal</label>
            <input type="text" 
                   id="nama_smp"
                   name="nama_smp" 
                   value="{{ old('nama_smp') }}"
                   placeholder="Terisi otomatis melalui sistem pusat jika NPSN valid" 
                   class="w-full px-4 py-2.5 bg-slate-100 border border-outline-variant text-slate-600 rounded-lg text-sm font-bold cursor-not-allowed" 
                   readonly>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Agama <span class="text-rose-600">*</span></label>
            <select name="agama" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="" disabled {{ old('agama') == '' ? 'selected' : '' }}>-- Pilih Agama --</option>
                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                <option value="Khonghucu" {{ old('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
            </select>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Kewarganegaraan <span class="text-rose-600">*</span></label>
            <select name="kewarganegaraan" class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                <option value="Indonesia" {{ old('kewarganegaraan', 'Indonesia') == 'Indonesia' ? 'selected' : '' }}>Indonesia (WNI)</option>
                <option value="Asing" {{ old('kewarganegaraan') == 'Asing' ? 'selected' : '' }}>Asing (WNA)</option>
            </select>
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Bahasa Percakapan Sehari-hari <span class="text-rose-600">*</span></label>
            <input type="text" 
                   name="bahasa_harian" 
                   value="{{ old('bahasa_harian') }}"
                   oninput="this.value = toProperCase(this.value)" 
                   placeholder="Contoh: Jawa, Indonesia" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" 
                   required>
        </div>
    </div>

    <div class="bg-surface-container-low p-5 rounded-xl border border-outline-variant/60 space-y-4">
            <div class="border-b border-outline-variant/40 pb-2">
                <h3 class="text-sm font-bold text-slate-700 tracking-wide uppercase">Struktur Silsilah Keluarga</h3>
                <p class="text-xs text-rose-700 font-medium mt-1 bg-rose-50 border border-rose-100 rounded-lg p-2 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[16px] shrink-0">info</span>
                    <strong>Catatan Penting:</strong> Anda (diri sendiri) tidak ikut dihitung sebagai saudara. Contoh: Jika di dalam KK total ada 4 anak dan Anda anak ke-2, maka jumlah saudara Anda adalah 3.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-on-surface-variant">Anak Ke- (Angka) <span class="text-rose-600">*</span></label>
                    <input type="number" min="1" max="50" name="anak_ke" value="{{ old('anak_ke') }}" class="w-full px-3 py-2 bg-surface border border-outline-variant rounded-lg text-sm" required>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-semibold text-on-surface-variant">Status Keberadaan Keluarga <span class="text-rose-600">*</span></label>
                    <select name="status_keluarga" class="w-full px-3 py-2 bg-surface border border-outline-variant rounded-lg text-sm" required>
                        <option value="Lengkap" {{ old('status_keluarga') == 'Lengkap' ? 'selected' : '' }}>Keluarga Lengkap</option>
                        <option value="Yatim" {{ old('status_keluarga') == 'Yatim' ? 'selected' : '' }}>Yatim (Ayah Wafat)</option>
                        <option value="Piatu" {{ old('status_keluarga') == 'Piatu' ? 'selected' : '' }}>Piatu (Ibu Wafat)</option>
                        <option value="Yatim Piatu" {{ old('status_keluarga') == 'Yatim Piatu' ? 'selected' : '' }}>Yatim Piatu (Keduanya Wafat)</option>
                    </select>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-slate-500 font-semibold">Total Saudara Anda</label>
                    <div class="w-full px-3 py-2 bg-slate-200 border border-slate-300 rounded-lg text-sm font-bold text-slate-700 flex justify-between items-center">
                        <span id="label-total-saudara">0</span>
                        <span class="text-xs font-medium text-slate-500">(Luar Diri Sendiri)</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                <div class="space-y-1">
                    <div class="flex flex-col">
                        <label class="text-xs font-semibold text-on-surface-variant">Jumlah Saudara Kandung</label>
                        <span class="text-[10px] text-on-surface-variant/70 mb-1">(Satu Ayah & Satu Ibu)</span>
                    </div>
                    <input type="number" min="0" id="saudara_kandung" value="{{ old('jumlah_saudara_kandung', '0') }}" 
                        oninput="hitungSaudaraBiasa()" 
                        onfocus="if(this.value == '0') this.value = '';" 
                        onblur="if(this.value == '') { this.value = '0'; hitungSaudaraBiasa(); }"
                        name="jumlah_saudara_kandung" class="w-full px-3 py-2 bg-surface border border-outline-variant rounded-lg text-sm">
                </div>
                
                <div class="space-y-1">
                    <div class="flex flex-col">
                        <label class="text-xs font-semibold text-on-surface-variant">Jumlah Saudara Tiri</label>
                        <span class="text-[10px] text-on-surface-variant/70 mb-1">(Beda Ayah atau Beda Ibu)</span>
                    </div>
                    <input type="number" min="0" id="saudara_tiri" value="{{ old('jumlah_saudara_tiri', '0') }}" 
                        oninput="hitungSaudaraBiasa()" 
                        onfocus="if(this.value == '0') this.value = '';" 
                        onblur="if(this.value == '') { this.value = '0'; hitungSaudaraBiasa(); }"
                        name="jumlah_saudara_tiri" class="w-full px-3 py-2 bg-surface border border-outline-variant rounded-lg text-sm">
                </div>
                
                <div class="space-y-1">
                    <div class="flex flex-col">
                        <label class="text-xs font-semibold text-on-surface-variant">Jumlah Saudara Angkat</label>
                        <span class="text-[10px] text-on-surface-variant/70 mb-1">(Adopsi/Status Hukum)</span>
                    </div>
                    <input type="number" min="0" id="saudara_angkat" value="{{ old('jumlah_saudara_angkat', '0') }}" 
                        oninput="hitungSaudaraBiasa()" 
                        onfocus="if(this.value == '0') this.value = '';" 
                        onblur="if(this.value == '') { this.value = '0'; hitungSaudaraBiasa(); }"
                        name="jumlah_saudara_angkat" class="w-full px-3 py-2 bg-surface border border-outline-variant rounded-lg text-sm">
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        hitungSaudaraBiasa();
    });
</script>