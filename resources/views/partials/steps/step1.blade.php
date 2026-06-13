<div class="space-y-6">
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">info</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Penting:</span> Tahap ini digunakan untuk mencocokkan data penerimaan siswa dengan database sekolah. Pastikan NISN yang dimasukkan aktif dan sesuai dengan kartu peserta SPMB Anda.
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label for="nisn" class="block text-sm font-semibold text-on-surface">
                Nomor Induk Siswa Nasional (NISN) <span class="text-rose-600">*</span>
            </label>
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px]">badge</span>
                <input type="text" 
                       id="nisn" 
                       name="nisn" 
                       x-model="nisn" 
                       value="{{ old('nisn') }}"
                       maxlength="10"
                       placeholder="Contoh: 0081234567"
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                       class="w-full pl-10 pr-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                       required>
            </div>
            <p class="text-xs text-outline">Wajib 10 digit angka</p>
        </div>

        <div class="space-y-2">
            <label for="passed_stage" class="block text-sm font-semibold text-on-surface">
                Tahap Jalur Kelompok <span class="text-rose-600">*</span>
            </label>
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px]">account_tree</span>
                <select id="passed_stage" 
                        name="passed_stage" 
                        x-model="passed_stage" 
                        class="w-full pl-10 pr-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all"
                        required>
                    <option value="" disabled {{ old('passed_stage') == '' ? 'selected' : '' }}>-- Pilih Tahap Jalur --</option>
                    <option value="Tahap 1" {{ old('passed_stage') == 'Tahap 1' ? 'selected' : '' }}>Tahap 1 (Jalur Domisili / Zonasi Awal)</option>
                    <option value="Tahap 2" {{ old('passed_stage') == 'Tahap 2' ? 'selected' : '' }}>Tahap 2 (Jalur Afirmasi, Jalur Mutasi Orang Tua/Wali, Jalur Prestasi Hasil Lomba)</option>
                    <option value="Tahap 3" {{ old('passed_stage') == 'Tahap 3' ? 'selected' : '' }}>Tahap 3 (Jalur Nilai Prestasi Akademik)</option>
                </select>
            </div>
            <p class="text-xs text-outline">Pilih sesuai jalur pendaftaran resmi Anda</p>
        </div>
    </div>

    <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-6">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-emerald-600 text-[24px] mt-0.5">forum</span>
            <div class="text-sm text-slate-700 leading-relaxed">
                <span class="font-bold text-emerald-700 block mb-0.5">Official Group - Murid Baru 2026/2027</span>
                Sebelum melanjutkan proses, harap bergabung grup terlebih dahulu untuk mendapatkan informasi resmi, panduan bimbingan, atau mengajukan pertanyaan seputar proses daftar ulang.
            </div>
        </div>
        <a href="https://chat.whatsapp.com/L60KiFhdk3t96AkZyVa27k?mode=gi_t" 
           target="_blank" 
           rel="noopener noreferrer" 
           class="inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-lg shadow-sm transition-all whitespace-nowrap self-start sm:self-center">
            <span class="material-symbols-outlined text-[16px]">chat</span>
            Gabung Grup WA
        </a>
    </div>

    <div class="mt-8 p-4 bg-slate-50 border border-slate-200 rounded-xl">
        <label class="flex items-start gap-3 cursor-pointer select-none">
            <input type="checkbox" 
                   id="is_passed_checkbox"
                   name="is_passed"
                   x-model="is_passed" 
                   value="1"
                   {{ old('is_passed') == '1' ? 'checked' : '' }}
                   class="mt-1 w-4 h-4 text-primary bg-surface border-slate-300 rounded focus:ring-primary focus:ring-offset-0" 
                   required>
            <span class="text-sm text-slate-600 leading-relaxed">
                Saya menyatakan dengan sadar bahwa saya telah diterima di SMAN 1 Turen melalui jalur SPMB tahun ajaran 2026/2027 dan siap melakukan verifikasi data induk siswa baru.
            </span>
        </label>
    </div>
</div>