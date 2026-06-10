<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Pusat Bantuan - SMAN 1 Turen</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    @vite('resources/css/app.css')
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-dim": "#d2d9f4",
                        "surface-container-low": "#f2f3ff",
                        "on-tertiary-fixed": "#171c1f",
                        "tertiary-container": "#3c4144",
                        "primary-container": "#1e3a8a",
                        "secondary-fixed": "#d3e4fe",
                        "tertiary-fixed-dim": "#c3c7cb",
                        "on-primary-fixed": "#00164e",
                        "surface": "#faf8ff",
                        "tertiary-fixed": "#dfe3e7",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-container": "#54647a",
                        "primary-fixed-dim": "#b6c4ff",
                        "on-primary-fixed-variant": "#264191",
                        "inverse-on-surface": "#eef0ff",
                        "on-surface-variant": "#444651",
                        "on-surface": "#131b2e",
                        "surface-container-high": "#e2e7ff",
                        "surface-variant": "#dae2fd",
                        "on-primary": "#ffffff",
                        "on-tertiary-fixed-variant": "#43474b",
                        "background": "#faf8ff",
                        "on-error": "#ffffff",
                        "outline": "#757682",
                        "on-error-container": "#93000a",
                        "error": "#ba1a1a",
                        "on-background": "#131b2e",
                        "error-container": "#ffdad6",
                        "secondary-container": "#d0e1fb",
                        "surface-bright": "#faf8ff",
                        "primary-fixed": "#dce1ff",
                        "on-secondary": "#ffffff",
                        "on-primary-container": "#90a8ff",
                        "tertiary": "#262b2e",
                        "on-tertiary-container": "#a8adb1",
                        "surface-tint": "#4059aa",
                        "secondary-fixed-dim": "#b7c8e1",
                        "outline-variant": "#c5c5d3",
                        "on-tertiary": "#ffffff",
                        "on-secondary-fixed-variant": "#38485d",
                        "inverse-primary": "#b6c4ff",
                        "surface-container": "#eaedff",
                        "on-secondary-fixed": "#0b1c30",
                        "primary": "#00236f",
                        "inverse-surface": "#283044",
                        "surface-container-highest": "#dae2fd",
                        "secondary": "#505f76"
                    }
                }
            }
        }
    </script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .grid-pattern {
            background-size: 32px 32px;
            background-image: linear-gradient(to right, rgba(0, 35, 111, 0.04) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(0, 35, 111, 0.04) 1px, transparent 1px);
        }
        details summary::-webkit-details-marker { display: none; }
    </style>
</head>
<body class="bg-background text-on-background antialiased flex flex-col min-h-screen">

    <!-- NAVIGATION BAR -->
    <nav class="bg-surface-container-lowest border-b border-outline-variant shadow-sm w-full z-50 top-0 sticky">
        <div class="flex justify-between items-center w-full px-4 md:px-10 max-w-7xl mx-auto h-20">
            <div class="flex items-center gap-3 shrink-0">
                <div class="w-11 h-11 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMAN 1 Turen" class="max-w-full max-h-full object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                </div>
                <span class="text-xl md:text-2xl font-extrabold text-primary tracking-tight">SMA Negeri 1 Turen</span>
            </div>
            
            <ul class="hidden md:flex gap-8 items-center h-full">
                <li class="h-full flex items-center">
                    <a class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium pt-1 pb-1 cursor-pointer" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="h-full flex items-center">
                    <a class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium pt-1 pb-1 cursor-pointer" href="{{ url('/verifikasi') }}">Daftar Ulang</a>
                </li>
                <li class="h-full flex items-center">
                    <a class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium pt-1 pb-1 cursor-pointer" href="{{ url('/verifikasi-ijazah') }}">Verifikasi Ijazah</a>
                </li>
                <li class="h-full flex items-center">
                    <a class="text-sm text-primary border-b-2 border-primary font-bold pt-1 pb-1 cursor-pointer" href="{{ url('/bantuan') }}">Bantuan</a>
                </li>
            </ul>
            
            <div class="hidden md:block shrink-0">
                <a href="/login" class="bg-surface text-primary border border-outline-variant text-sm font-medium px-4 py-2 rounded-lg hover:bg-surface-container transition-colors flex items-center gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-[18px]">login</span>
                    Login Admin
                </a>
            </div>
            
            <button onclick="toggleMobileMenu()" class="md:hidden text-on-surface-variant cursor-pointer p-2 rounded-lg hover:bg-surface-container transition-all">
                <span class="material-symbols-outlined" id="menu-icon">menu</span>
            </button>
        </div>

        <!-- Mobile Menu Container -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-outline-variant bg-surface-container-lowest px-4 py-4 space-y-3 shadow-inner">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-on-surface-variant hover:bg-surface-container hover:text-primary">Beranda</a>
            <a href="{{ url('/verifikasi') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-on-surface-variant hover:bg-surface-container hover:text-primary">Daftar Ulang</a>
            <a href="{{ url('/verifikasi-ijazah') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-on-surface-variant hover:bg-surface-container hover:text-primary">Verifikasi Ijazah</a>
            <a href="{{ url('/bantuan') }}" class="block px-3 py-2 rounded-lg text-sm font-bold text-primary bg-primary-container/10">Bantuan</a>
            <hr class="border-outline-variant/50">
            <a href="/login" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-primary bg-surface border border-outline-variant">
                <span class="material-symbols-outlined text-[18px]">login</span>
                Login Admin
            </a>
        </div>
    </nav>

    <!-- CONTENT AREA -->
    <main class="flex-grow">
        <!-- Hero Section Pusat Bantuan Modern -->
        <section class="relative overflow-hidden bg-gradient-to-b from-surface-container-low to-background py-20 px-4 md:px-10 border-b border-outline-variant/30">
            <div class="absolute inset-0 grid-pattern opacity-30"></div>
            <div class="max-w-4xl mx-auto text-center relative z-10">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-container text-white text-xs font-semibold uppercase tracking-wider mb-5 shadow-sm">
                    <span class="material-symbols-outlined text-[16px] animate-pulse">help</span>
                    <span>Layanan Helpdesk SPMB</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-on-surface tracking-tight mb-4">
                    Ada yang Bisa Kami <span class="text-primary">Bantu?</span>
                </h1>
                <p class="text-base md:text-lg text-on-surface-variant max-w-2xl mx-auto mb-8">
                    Cari panduan pengisian berkas validasi data induk dan mekanisme daftar ulang Anda secara instan di bawah ini.
                </p>

                <!-- Search Bar Eksklusif -->
                <div class="max-w-xl mx-auto relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-outline group-focus-within:text-primary transition-colors">
                        <span class="material-symbols-outlined">search</span>
                    </div>
                    <input type="text" id="faq-search" onkeyup="searchFAQ()" placeholder="Ketik kata kunci pertanyaan Anda di sini..." 
                           class="w-full pl-12 pr-4 py-3.5 bg-surface-container-lowest border border-outline-variant rounded-2xl shadow-md focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary placeholder-outline transition-all text-sm md:text-base text-on-surface" />
                </div>
            </div>
        </section>

        <!-- FAQ Grid Section -->
        <section class="py-16 px-4 md:px-10 max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
                <div>
                    <h2 class="text-2xl font-extrabold text-on-surface flex items-center gap-2 tracking-tight">
                        <span class="material-symbols-outlined text-primary text-[28px]">quiz</span>
                        Daftar Informasi & FAQ
                    </h2>
                    <p class="text-sm text-on-surface-variant mt-1">Klik pada baris pertanyaan untuk melihat detail solusi teknis.</p>
                </div>
                <div id="search-status" class="hidden text-xs font-medium bg-secondary-container text-on-secondary-container px-3 py-1.5 rounded-lg">
                    Menampilkan hasil pencarian
                </div>
            </div>
            
            <!-- Grid Layout untuk FAQ -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="faq-container">
                
                <!-- Item FAQ 1 -->
                <div class="faq-item border border-outline-variant hover:border-primary/50 rounded-2xl bg-surface-container-lowest p-6 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <details class="group/details">
                        <summary class="flex justify-between items-start gap-4 font-bold text-base text-on-surface cursor-pointer list-none">
                            <span class="faq-question leading-snug group-hover/details:text-primary transition-colors">Bagaimana jika nomor ijazah SMP/MTs belum keluar saat mendaftar?</span>
                            <span class="transition-transform duration-300 group-open/details:rotate-180 material-symbols-outlined text-outline group-hover/details:text-primary shrink-0">expand_more</span>
                        </summary>
                        <div class="text-sm text-on-surface-variant mt-4 leading-relaxed border-t border-outline-variant/30 pt-4">
                            Jika ijazah asli belum diterbitkan oleh sekolah asal Anda, silakan gunakan nomor yang tertera pada <strong>Surat Keterangan Lulus (SKL)</strong> terlebih dahulu. Anda dapat melakukan pemutakhiran berkas kembali pada menu "Verifikasi Ijazah" setelah dokumen fisik resmi Anda terima.
                        </div>
                    </details>
                </div>

                <!-- Item FAQ 2 -->
                <div class="faq-item border border-outline-variant hover:border-primary/50 rounded-2xl bg-surface-container-lowest p-6 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <details class="group/details">
                        <summary class="flex justify-between items-start gap-4 font-bold text-base text-on-surface cursor-pointer list-none">
                            <span class="faq-question leading-snug group-hover/details:text-primary transition-colors">Berapa batas ukuran maksimal file scan dokumen yang diunggah?</span>
                            <span class="transition-transform duration-300 group-open/details:rotate-180 material-symbols-outlined text-outline group-hover/details:text-primary shrink-0">expand_more</span>
                        </summary>
                        <div class="text-sm text-on-surface-variant mt-4 leading-relaxed border-t border-outline-variant/30 pt-4">
                            Ukuran maksimal setiap berkas dokumen pendukung (seperti scan Kartu Keluarga, Akta Kelahiran, atau SKL) adalah <strong>2 MB</strong> dengan format file berupa <strong>PDF</strong> atau <strong>JPEG/PNG</strong>. Pastikan hasil scan terbaca jelas dan tidak buram.
                        </div>
                    </details>
                </div>

                <!-- Item FAQ 3 -->
                <div class="faq-item border border-outline-variant hover:border-primary/50 rounded-2xl bg-surface-container-lowest p-6 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <details class="group/details">
                        <summary class="flex justify-between items-start gap-4 font-bold text-base text-on-surface cursor-pointer list-none">
                            <span class="faq-question leading-snug group-hover/details:text-primary transition-colors">Salah mengisi biodata dan berkas terlanjur dikirim, apa solusinya?</span>
                            <span class="transition-transform duration-300 group-open/details:rotate-180 material-symbols-outlined text-outline group-hover/details:text-primary shrink-0">expand_more</span>
                        </summary>
                        <div class="text-sm text-on-surface-variant mt-4 leading-relaxed border-t border-outline-variant/30 pt-4">
                            Data yang sudah dikirim <strong>(final submit)</strong> tidak bisa diubah langsung demi menjaga integritas data. Silakan hubungi operator admin Tata Usaha sekolah melalui saluran <strong>WhatsApp </strong> di bawah dengan menyertakan Nomor Induk Siswa Nasional (NISN) dan nama lengkap untuk pembukaan kunci akses <strong>form</strong>.
                        </div>
                    </details>
                </div>

                <!-- Item FAQ 4 -->
                <div class="faq-item border border-outline-variant hover:border-primary/50 rounded-2xl bg-surface-container-lowest p-6 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <details class="group/details">
                        <summary class="flex justify-between items-start gap-4 font-bold text-base text-on-surface cursor-pointer list-none">
                            <span class="faq-question leading-snug group-hover/details:text-primary transition-colors">Berapa lama proses validasi berkas fisik digital oleh tim sekolah?</span>
                            <span class="transition-transform duration-300 group-open/details:rotate-180 material-symbols-outlined text-outline group-hover/details:text-primary shrink-0">expand_more</span>
                        </summary>
                        <div class="text-sm text-on-surface-variant mt-4 leading-relaxed border-t border-outline-variant/30 pt-4">
                            Proses peninjauan dan validasi dokumen fisik digital memakan waktu maksimal <strong>2 x 24 jam</strong> pada hari kerja operasional. Anda dapat mengecek status perkembangan akun pendaftaran Anda secara berkala pada portal ini.
                        </div>
                    </details>
                </div>

            </div>

            <!-- Empty State Jika Pencarian Kosong -->
            <div id="empty-state" class="hidden text-center py-12 border border-dashed border-outline-variant rounded-2xl mt-6">
                <span class="material-symbols-outlined text-[48px] text-outline mb-2">find_in_page</span>
                <p class="text-on-surface font-semibold">Pertanyaan tidak ditemukan</p>
                <p class="text-xs text-on-surface-variant mt-1">Coba masukkan kata kunci lain atau langsung kontak helpdesk di bawah.</p>
            </div>
        </section>

        <!-- Kontak Pengaduan Cepat / CARD ANTI TRANSPARAN TOTAL -->
        <section class="py-12 px-4 md:px-10 max-w-7xl mx-auto mb-16">
            <div class="rounded-3xl p-8 md:p-12 shadow-xl relative overflow-hidden flex flex-col lg:flex-row lg:items-center justify-between gap-8 text-white" 
                 style="background: linear-gradient(135deg, #00236f 0%, #1e3a8a 100%) !important; opacity: 1 !important;">
                
                <div class="absolute right-0 top-0 opacity-10 translate-x-12 -translate-y-12 pointer-events-none">
                    <span class="material-symbols-outlined text-[360px]">contact_support</span>
                </div>
                
                <div class="relative z-10 max-w-2xl">
                    <span class="text-xs font-bold tracking-widest bg-white/20 px-3 py-1 rounded-full inline-block mb-3">Respon Cepat</span>
                    <h3 class="text-2xl md:text-3xl font-extrabold tracking-tight mb-3">Masih Belum Menemukan Solusi?</h3>
                    <p class="text-sm md:text-base text-white/85 leading-relaxed">
                        Jika kendala teknis sistem atau sinkronisasi data Anda masih belum teratasi, silakan hubungi tim helpdesk panitia SPMB SMAN 1 Turen secara interaktif melalui platform komunikasi berikut.
                    </p>
                </div>
                
                <div class="relative z-10 flex flex-col sm:flex-row gap-4 shrink-0">
                    <a href="https://wa.me/6282264928953" target="_blank" rel="noopener noreferrer" class="bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold text-sm px-6 py-3.5 rounded-xl inline-flex items-center justify-center gap-2 transition-all shadow-md hover:scale-105 active:scale-95">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397 0 12.008 0c3.202.001 6.212 1.249 8.477 3.517 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.713-1.455L0 24zm6.79-4.202c1.643.976 3.251 1.489 4.936 1.492 5.503 0 9.981-4.476 9.983-9.974.001-2.663-1.025-5.167-2.89-7.034-1.866-1.868-4.35-2.898-7.017-2.899-5.507 0-9.984 4.478-9.986 9.977-.001 1.774.463 3.507 1.345 5.048l-.993 3.626 3.712-.973zm10.457-7.142c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                        Hubungi WhatsApp
                    </a>
                    <a href="mailto:admin@smanegeri1turen.sch.id" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 font-bold text-sm px-6 py-3.5 rounded-xl inline-flex items-center justify-center gap-2 transition-all hover:scale-105 active:scale-95">
                        <span class="material-symbols-outlined text-[20px]">mail</span>
                        Email Resmi
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER AREA (PREMIUM EMBEDDED COLOR LOGOS) -->
    <footer class="bg-surface-container-high border-t border-outline-variant mt-auto w-full">
        <div class="w-full px-4 md:px-10 py-12 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-12">
                
                <!-- Kolom 1: Profil Singkat -->
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
                
                <!-- Kolom 2: Kontak Fisik & Telepon -->
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
                
                <!-- Kolom 3: Hanya Logo Media Sosial & Kontak Premium -->
                <div class="col-span-1 md:col-span-4">
                    <h4 class="text-base text-on-surface font-bold mb-4">Media Sosial & Hubungan</h4>
                    <div class="flex flex-wrap gap-4 mt-2">
                        
                        <!-- Logo Website Resmi -->
                        <a href="https://smanegeri1turen.sch.id" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           title="Website Resmi Sekolah"
                           class="w-11 h-11 bg-white border border-outline-variant/60 rounded-xl flex items-center justify-center transition-all duration-200 shadow-sm hover:shadow-md hover:scale-110 active:scale-95">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                        </a>

                        <!-- Logo WhatsApp -->
                        <a href="https://wa.me/6282131067682" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           title="WhatsApp Layanan Info"
                           class="w-11 h-11 bg-white border border-outline-variant/60 rounded-xl flex items-center justify-center transition-all duration-200 shadow-sm hover:shadow-md hover:scale-110 active:scale-95">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.004 2C6.48 2 2 6.48 2 12.004c0 1.848.502 3.577 1.376 5.074L2 22l5.078-1.332a9.941 9.941 0 004.926 1.336c5.524 0 10.004-4.48 10.004-10.004C22.008 6.48 17.528 2 12.004 2zm5.834 14.282c-.244.692-1.216 1.258-1.674 1.32-.424.056-.976.084-2.836-.648-2.378-.936-3.908-3.344-4.026-3.504-.118-.16-1.018-1.352-1.018-2.58 0-1.226.642-1.83.872-2.078.228-.248.5-.31.67-.31h.43c.134 0 .316-.05.494.382.184.446.634 1.544.69 1.658.056.114.092.248.016.4-.076.152-.152.248-.298.42-.148.172-.31.338-.444.492-.15.17-.306.356-.132.654.174.298.772 1.272 1.654 2.056.126.11.238.16.354.212.754.34 1.368.562 1.604.59.39.046.786-.164.992-.44.204-.274.872-1.014.992-1.256.118-.242.238-.204.394-.146s1.004.474 1.176.56c.172.086.288.128.332.204.044.076.044.44-.2.112z" fill="#25D366"/>
                            </svg>
                        </a>

                        <!-- Logo Instagram -->
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

                        <!-- Logo E-mail -->
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
            
            <!-- Hak Cipta -->
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

    <!-- INTERACTIVE JAVASCRIPT FUCTIONS -->
    <script>
        function searchFAQ() {
            const input = document.getElementById('faq-search');
            const filter = input.value.toLowerCase();
            const container = document.getElementById('faq-container');
            const items = container.getElementsByClassName('faq-item');
            const status = document.getElementById('search-status');
            const emptyState = document.getElementById('empty-state');
            
            let matchCount = 0;

            if (filter.length > 0) {
                status.classList.remove('hidden');
            } else {
                status.classList.add('hidden');
            }

            for (let i = 0; i < items.length; i++) {
                const questionText = items[i].getElementsByClassName('faq-question')[0].innerText.toLowerCase();
                const answerText = items[i].getElementsByTagName('div')[0].innerText.toLowerCase();
                
                if (questionText.includes(filter) || answerText.includes(filter)) {
                    items[i].style.display = "";
                    matchCount++;
                } else {
                    items[i].style.display = "none";
                }
            }

            if (matchCount === 0 && filter.length > 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('menu-icon');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                icon.innerText = 'close';
            } else {
                menu.classList.add('hidden');
                icon.innerText = 'menu';
            }
        }
    </script>
</body>
</html>