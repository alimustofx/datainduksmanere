<div class="space-y-6" x-data="{ mempunyaiKartu: '0' }">
    <!-- Note Petunjuk -->
    <div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex items-start gap-3">
        <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">credit_card</span>
        <div class="text-sm text-on-surface-variant leading-relaxed">
            <span class="font-bold text-primary">Isian Kartu Kesejahteraan:</span> Jika Anda memiliki Kartu Indonesia Pintar (KIP), Program Keluarga Harapan (PKH), atau Kartu Keluarga Sejahtera (KKS), silakan konfirmasi di bawah ini agar data sinkron dengan sistem Dapodik Pusat.
        </div>
    </div>

    <!-- Pertanyaan Boolean KIP/PKH/KKS -->
    <div class="bg-surface-container-low border border-outline-variant rounded-xl p-5 space-y-4">
        <label class="block text-sm font-bold text-on-surface uppercase tracking-wide">Apakah Anda memiliki kartu KIP / PKH / KKS?</label>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Pilihan 0 (False) -->
            <label class="flex items-center gap-3 p-3 bg-white border rounded-xl cursor-pointer transition-all select-none"
                   :class="mempunyaiKartu === '0' ? 'border-primary ring-1 ring-primary bg-primary/5' : 'border-outline-variant hover:bg-slate-50'">
                <input type="radio" 
                       name="mempunyai_kip_pkh_kks" 
                       value="0" 
                       x-model="mempunyaiKartu"
                       class="w-4 h-4 text-primary focus:ring-primary">
                <span class="text-sm font-semibold text-on-surface">Tidak Memiliki</span>
            </label>

            <!-- Pilihan 1 (True) -->
            <label class="flex items-center gap-3 p-3 bg-white border rounded-xl cursor-pointer transition-all select-none"
                   :class="mempunyaiKartu === '1' ? 'border-primary ring-1 ring-primary bg-primary/5' : 'border-outline-variant hover:bg-slate-50'">
                <input type="radio" 
                       name="mempunyai_kip_pkh_kks" 
                       value="1" 
                       x-model="mempunyaiKartu"
                       class="w-4 h-4 text-primary focus:ring-primary">
                <span class="text-sm font-semibold text-on-surface">Ya, Saya Memiliki</span>
            </label>
        </div>
    </div>

    <!-- Input Nomor Kartu (Hanya Muncul Jika Pilihan = Ya) -->
    <div class="space-y-2" 
         x-show="mempunyaiKartu === '1'" 
         x-cloak 
         x-transition:enter="transition ease-out duration-200" 
         x-transition:enter-start="opacity-0 transform -translate-y-2">
        <label class="block text-sm font-semibold text-on-surface">Nomor Kartu Kesejahteraan (KIP/PKH/KKS) <span class="text-rose-600">*</span></label>
        <input type="text" 
               name="nomor_kartu_kesejahteraan" 
               maxlength="30"
               oninput="this.value = this.value.replace(/[^0-9A-Za-z.-]/g, '').toUpperCase()" 
               placeholder="Contoh: KIP-XXXXX / 20 digit nomor kartu" 
               :required="mempunyaiKartu === '1'"
               class="w-full px-4 py-2.5 bg-surface border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary text-sm font-medium transition-all">
        <span class="text-xs text-slate-400 block">Masukkan nomor yang tertera pada bagian depan kartu fisik Anda.</span>
    </div>
</div>