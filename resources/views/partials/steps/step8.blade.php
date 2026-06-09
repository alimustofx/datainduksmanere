<div class="space-y-6">
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">school</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Isian Akademik Kelulusan:</span> Silakan masukkan informasi kelulusan dari sekolah asal Anda. Jika Surat Kelulusan/Ijazah asli Anda dari SMP/MTs belum resmi diterbitkan oleh pihak sekolah, kolom <strong>Tanggal</strong> dan <strong>Nomor Ijazah</strong> diperbolehkan untuk <span class="font-semibold text-amber-700">dikosongkan terlebih dahulu</span>.
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Tanggal Terbit Ijazah <span class="text-xs font-normal text-slate-400">(Opsional)</span></label>
            <input type="date" 
                   name="tanggal_ijazah" 
                   value="{{ old('tanggal_ijazah') }}"
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
        </div>
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Nomor Seri Ijazah <span class="text-xs font-normal text-slate-400">(Opsional)</span></label>
            <input type="text" 
                   name="nomor_ijazah" 
                   value="{{ old('nomor_ijazah') }}"
                   oninput="this.value = this.value.toUpperCase()" 
                   placeholder="Contoh: DN-05/D-SMP/23/XXXXXXX" 
                   class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all uppercase">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-outline-variant/60">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-on-surface">Lama Belajar di Sekolah Asal (SMP/MTs) <span class="text-rose-600">*</span></label>
            <div class="relative">
                <select name="lama_belajar_smp" class="w-full pl-4 pr-16 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all" required>
                    <option value="3" {{ old('lama_belajar_smp', '3') == '3' ? 'selected' : '' }}>3 Tahun (Normal)</option>
                    <option value="2" {{ old('lama_belajar_smp') == '2' ? 'selected' : '' }}>2 Tahun (Akselerasi)</option>
                    <option value="4" {{ old('lama_belajar_smp') == '4' ? 'selected' : '' }}>4 Tahun atau Lebih</option>
                </select>
                <span class="absolute right-8 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-400 pointer-events-none">Tahun</span>
            </div>
        </div>
        <div class="hidden md:block"></div>
    </div>
</div>