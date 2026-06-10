<div class="bg-background text-on-background flex flex-col min-h-screen font-sans">
    
    <nav class="bg-surface-container-lowest border-b border-outline-variant shadow-sm w-full z-50 top-0 sticky">
        <div class="flex justify-between items-center w-full px-4 md:px-10 max-w-7xl mx-auto h-20">
            <div class="flex items-center gap-3 shrink-0">
                <div class="w-11 h-11 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMAN 1 Turen" class="max-w-full max-h-full object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                </div>
                <span class="text-xl md:text-2xl font-bold text-primary tracking-tight">SMA Negeri 1 Turen</span>
            </div>
            
            <ul class="hidden md:flex gap-8 items-center h-full">
                <li class="h-full flex items-center">
                    <a class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium pt-1 pb-1 cursor-pointer" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="h-full flex items-center">
                    <a class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium pt-1 pb-1 cursor-pointer" href="{{ url('/verifikasi') }}">Daftar Ulang</a>
                </li>
                <li class="h-full flex items-center">
                    <a class="text-sm text-primary border-b-2 border-primary font-bold pt-1 pb-1 cursor-pointer" href="{{ url('/verifikasi-ijazah') }}">Verifikasi Ijazah</a>
                </li>
                <li class="h-full flex items-center">
                    <a class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium pt-1 pb-1 cursor-pointer" href="{{ url('/bantuan') }}">Bantuan</a>
                </li>
            </ul>
            
            <div class="hidden md:block shrink-0">
                <a href="/login" class="bg-surface text-primary border border-outline-variant text-sm font-medium px-4 py-2 rounded-lg hover:bg-surface-container transition-colors flex items-center gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-[18px]">login</span>
                    Login Admin
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center py-16 px-4 relative bg-surface-container-low">
        <div class="absolute inset-0 opacity-30 pointer-events-none" style="background-size: 32px 32px; background-image: linear-gradient(to right, rgba(0, 35, 111, 0.04) 1px, transparent 1px), linear-gradient(to bottom, rgba(0, 35, 111, 0.04) 1px, transparent 1px);"></div>
        
        <div class="w-full max-w-xl bg-surface rounded-2xl p-8 shadow-2xl border border-outline-variant/40 relative z-10">
            
            <div class="flex items-center gap-4 mb-8 pb-5 border-b border-outline-variant/30">
                <div class="w-14 h-14 bg-primary-container text-on-primary-container rounded-2xl flex items-center justify-center shadow-inner">
                    <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">school</span>
                </div>
                <div>
                    <h3 class="text-xl font-extrabold text-on-surface leading-snug">Pembaruan Ijazah Kelulusan</h3>
                    <p class="text-sm text-on-surface-variant font-medium mt-0.5">Siswa Baru SMA Negeri 1 Turen</p>
                </div>
            </div>

            @if (session()->has('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-xl flex items-start gap-3 text-sm font-medium shadow-sm animate-fadeIn">
                    <span class="material-symbols-outlined text-emerald-600 mt-0.5">check_circle</span>
                    <div>
                        <span class="font-bold block mb-0.5">Penyimpanan Berhasil</span>
                        <p class="text-emerald-700/90 font-normal leading-relaxed">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(!$student)
                <form wire:submit.prevent="checkNisn" class="space-y-6">
                    <p class="text-sm text-on-surface-variant leading-relaxed bg-surface-container-highest/40 p-4 rounded-xl border border-outline-variant/20">
                        Silakan masukkan 10 digit <strong>Nomor Induk Siswa Nasional (NISN)</strong> resmi Anda yang telah terdaftar pada sistem SPMB / daftar ulang sekolah untuk memulai pembaruan dokumen.
                    </p>

                    <div>
                        <label for="nisn" class="block text-sm font-bold text-on-surface mb-2.5">NISN Siswa</label>
                        <div class="relative">
                            <input type="text" id="nisn" wire:model.defer="nisn" placeholder="Masukkan 10 digit angka..." maxlength="10"
                                   class="w-full pl-12 pr-4 py-3.5 bg-surface-container-lowest border border-outline rounded-xl text-on-surface text-base font-medium placeholder-on-surface-variant/40 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm">
                            <span class="material-symbols-outlined absolute left-4 top-4 text-on-surface-variant/60 text-[22px]">badge</span>
                        </div>
                        @error('nisn') <span class="text-xs text-error mt-1.5 block font-semibold flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">error</span>{{ $message }}</span> @enderror
                        @if (session()->has('error')) <span class="text-xs text-error mt-1.5 block font-semibold flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">dangerous</span>{{ session('error') }}</span> @endif
                    </div>

                    <button type="submit" class="w-full bg-primary text-on-primary font-bold py-3.5 rounded-xl hover:bg-primary/90 hover:shadow-lg active:scale-[0.99] transition-all flex items-center justify-center gap-2.5 shadow-md text-base">
                        <span>Cari Data Pendaftaran</span>
                        <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                    </button>
                </form>
            @else
                <div class="mb-6 p-4.5 bg-primary-container/20 border border-primary/20 rounded-2xl flex items-center gap-4 shadow-inner">
                    <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary shrink-0">
                        <span class="material-symbols-outlined text-[22px]">account_circle</span>
                    </div>
                    <div class="text-sm">
                        <span class="text-xs text-on-surface-variant/80 font-bold uppercase tracking-wider block">Siswa Teridentifikasi</span>
                        <p class="font-extrabold text-base text-primary leading-tight mt-0.5">{{ $student->nama_lengkap }}</p>
                        <p class="text-xs text-on-surface-variant font-medium mt-1">Asal Sekolah: <span class="font-bold text-on-surface">{{ $student->nama_smp }}</span></p>
                    </div>
                </div>

                <form wire:submit.prevent="saveCertificate" class="space-y-5" enctype="multipart/form-data">
                    <div>
                        <label for="nomor_ijazah" class="block text-sm font-bold text-on-surface mb-2">Nomor Ijazah Kelulusan</label>
                        <div class="relative">
                            <input type="text" id="nomor_ijazah" wire:model.defer="nomor_ijazah" placeholder="Contoh: DN-05/D-SMP/21/0000001"
                                   class="w-full pl-12 pr-4 py-3.5 bg-surface-container-lowest border border-outline rounded-xl text-on-surface font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm">
                            <span class="material-symbols-outlined absolute left-4 top-4 text-on-surface-variant/60 text-[22px]">description</span>
                        </div>
                        @error('nomor_ijazah') <span class="text-xs text-error mt-1.5 block font-semibold flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">error</span>{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="tanggal_ijazah" class="block text-sm font-bold text-on-surface mb-2">Tanggal Terbit / Kelulusan Ijazah</label>
                        <div class="relative">
                            <input type="date" id="tanggal_ijazah" wire:model.defer="tanggal_ijazah"
                                   class="w-full pl-12 pr-4 py-3.5 bg-surface-container-lowest border border-outline rounded-xl text-on-surface font-medium focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm">
                            <span class="material-symbols-outlined absolute left-4 top-4 text-on-surface-variant/60 text-[22px]">calendar_month</span>
                        </div>
                        @error('tanggal_ijazah') <span class="text-xs text-error mt-1.5 block font-semibold flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">error</span>{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="file_ijazah" class="block text-sm font-bold text-on-surface mb-2">Unggah Scan Ijazah Asli (PDF)</label>
                        <div class="relative">
                            <input type="file" id="file_ijazah" wire:model="file_ijazah" accept="application/pdf"
                                   class="w-full pl-12 pr-4 py-3 bg-surface-container-lowest border border-outline rounded-xl text-on-surface font-medium text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                            <span class="material-symbols-outlined absolute left-4 top-3.5 text-on-surface-variant/60 text-[22px]">upload_file</span>
                        </div>
                        <span class="text-[11px] text-on-surface-variant/70 block mt-1">Ekstensi file harus berupa **PDF** dengan kapasitas file maksimal **2MB**</span>
                        
                        <div wire:loading wire:target="file_ijazah" class="text-xs text-primary font-semibold mt-1 flex items-center gap-1.5">
                            <svg class="animate-spin h-3.5 w-3.5 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Sedang mengunggah berkas, mohon tunggu...</span>
                        </div>
                        
                        @error('file_ijazah') <span class="text-xs text-error mt-1.5 block font-semibold flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">error</span>{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4 pt-3">
                        <button type="button" wire:click="cancel" class="flex-1 bg-surface hover:bg-surface-container-high text-on-surface border border-outline rounded-xl text-sm font-bold py-3.5 transition-all active:scale-[0.98]">
                            Batal
                        </button>
                        <button type="submit" wire:loading.attr="disabled" class="flex-1 bg-primary text-on-primary font-bold text-sm py-3.5 rounded-xl hover:bg-primary/90 hover:shadow-md transition-all active:scale-[0.98] flex items-center justify-center gap-2 shadow-sm disabled:opacity-50 disabled:pointer-events-none">
                            <span class="material-symbols-outlined text-[18px]">save</span>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </main>

    <footer class="bg-surface-container-high border-t border-outline-variant mt-auto w-full">
        <div class="w-full px-4 md:px-10 py-12 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-12">
                
                <div class="col-span-1 md:col-span-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-on-primary overflow-hidden">
                            <img src="{{ asset('images/logo.png') }}" alt="Mini Logo" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        </div>
                        <span class="text-lg font-bold text-primary">SMA Negeri 1 Turen</span>
                    </div>
                    <p class="text-sm text-on-surface-variant mb-6 pr-4 leading-relaxed">
                        Mencetak generasi unggul, berprestasi, dan berakhlak mulia melalui pendidikan berkualitas dan pemanfaatan teknologi tepat guna.
                    </p>
                </div>
                
                <div class="col-span-1 md:col-span-4">
                    <h4 class="text-base text-on-surface font-bold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">location_on</span>
                            <span class="text-sm text-on-surface-variant leading-relaxed">Jl. Mayjen Panjaitan No. 65, Turen, Kabupaten Malang, Jawa Timur 65175</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-[20px] shrink-0">call</span>
                            <span class="text-sm text-on-surface-variant">(0341) 824711</span>
                        </li>
                    </ul>
                </div>
                
                <div class="col-span-1 md:col-span-4">
                    <h4 class="text-base text-on-surface font-bold mb-4">Media Sosial & Hubungan</h4>
                    <div class="flex flex-wrap gap-4 mt-2">
                        
                        <a href="https://smanegeri1turen.sch.id" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           title="Website Resmi Sekolah"
                           class="w-11 h-11 bg-white border border-outline-variant/60 rounded-xl flex items-center justify-center transition-all duration-200 shadow-sm hover:shadow-md hover:scale-110 active:scale-95">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                        </a>

                        <a href="https://wa.me/6282131067682"  
                           target="_blank" 
                           rel="noopener noreferrer" 
                           title="WhatsApp Layanan Info"
                           class="w-11 h-11 bg-white border border-outline-variant/60 rounded-xl flex items-center justify-center transition-all duration-200 shadow-sm hover:shadow-md hover:scale-110 active:scale-95">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.004 2C6.48 2 2 6.48 2 12.004c0 1.848.502 3.577 1.376 5.074L2 22l5.078-1.332a9.941 9.941 0 004.926 1.336c5.524 0 10.004-4.48 10.004-10.004C22.008 6.48 17.528 2 12.004 2zm5.834 14.282c-.244.692-1.216 1.258-1.674 1.32-.424.056-.976.084-2.836-.648-2.378-.936-3.908-3.344-4.026-3.504-.118-.16-1.018-1.352-1.018-2.58 0-1.226.642-1.83.872-2.078.228-.248.5-.31.67-.31h.43c.134 0 .316-.05.494.382.184.446.634 1.544.69 1.658.056.114.092.248.016.4-.076.152-.152.248-.298.42-.148.172-.31.338-.444.492-.15.17-.306.356-.132.654.174.298.772 1.272 1.654 2.056.126.11.238.16.354.212.754.34 1.368.562 1.604.59.39.046.786-.164.992-.44.204-.274.872-1.014.992-1.256.118-.242.238-.204.394-.146s1.004.474 1.176.56c.172.086.288.128.332.204.044.076.044.44-.2.112z" fill="#25D366"/>
                            </svg>
                        </a>

                        <a href="https://instagram.com/sman1turen" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           title="Instagram SMAN 1 Turen"
                           class="w-11 h-11 bg-white border border-outline-variant/60 rounded-xl flex items-center justify-center transition-all duration-200 shadow-sm hover:shadow-md hover:scale-110 active:scale-95">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <radialGradient id="ig-grad" cx="20%" cy="110%" r="130%">
                                        <stop offset="0%" stop-color="#FED373"/>
                                        <stop offset="30%" stop-color="#F15245"/>
                                        <stop offset="70%" stop-color="#D92E7F"/>
                                        <stop offset="100%" stop-color="#9B36B7"/>
                                    </radialGradient>
                                </defs>
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" fill="url(#ig-grad)"/>
                            </svg>
                        </a>

                        <a href="mailto:admin@smanegeri1turen.sch.id" 
                           title="Kirim Surat Elektronik"
                           class="w-11 h-11 bg-white border border-outline-variant/60 rounded-xl flex items-center justify-center transition-all duration-200 shadow-sm hover:shadow-md hover:scale-110 active:scale-95">
                            <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"></path>
                            </svg>
                        </a>

                    </div>
                </div>
                
            </div>
            
            <div class="pt-8 border-t border-outline-variant/30 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-on-surface-variant text-center md:text-left">
                    © 2026 SMAN 1 Turen. Hak Cipta Dilindungi.
                </p>
                <p class="text-xs text-on-surface-variant mt-2 md:mt-0 opacity-70 tracking-wide">
                    by Tata Usaha SMAN 1 Turen
                </p>
            </div>
        </div>
    </footer>
</div>