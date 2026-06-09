<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SMA Negeri 1 Turen - Verifikasi Data Induk Siswa Baru</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    @vite('resources/css/app.css')
    
    <style>
        /* Mengamankan jaminan keterbacaan grid overlay latar belakang */
        .grid-pattern {
            background-size: 32px 32px;
            background-image: linear-gradient(to right, rgba(0, 35, 111, 0.04) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(0, 35, 111, 0.04) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-background text-on-background antialiased flex flex-col min-h-screen">
<nav class="bg-surface-container-lowest border-b border-outline-variant shadow-sm w-full z-50 top-0 sticky">
        <div class="flex justify-between items-center w-full px-4 md:px-10 max-w-7xl mx-auto h-20">
            
            <div class="flex items-center gap-3 shrink-0">
                <div class="w-11 h-11 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMAN 1 Turen" class="max-w-full max-h-full object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                </div>
                <span class="text-xl md:text-2xl font-bold text-primary" style="font-family: 'Inter', sans-serif; tracking-tight; font-weight: 700;">SMA Negeri 1 Turen</span>
            </div>
            
            <ul class="hidden md:flex gap-8 items-center h-full">
                <li class="h-full flex items-center">
                    <a class="text-sm text-primary border-b-2 border-primary font-bold pt-1 pb-1 cursor-pointer" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="h-full flex items-center">
                    <a class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium pt-1 pb-1 cursor-pointer" href="{{ url('/verifikasi') }}">Daftar Ulang</a>
                </li>
                <li class="h-full flex items-center">
                    <a class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium pt-1 pb-1 cursor-pointer" href="{{ url('/verifikasi-ijazah') }}">Verifikasi Ijazah</a>
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
            
            <button class="md:hidden text-on-surface-variant cursor-pointer p-2 rounded-lg hover:bg-surface-container">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </nav>

    <main class="flex-grow">
        
        <section class="relative overflow-hidden bg-surface-container-low py-20 lg:py-32 px-4 md:px-10 border-b border-outline-variant/50">
            <div class="absolute inset-0 grid-pattern opacity-40"></div>
            <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary/5 to-transparent pointer-events-none"></div>
            
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-16 relative z-10">
                
                <div class="flex-1 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-container text-on-primary-container text-sm font-semibold mb-8 shadow-sm">
                        <span class="material-symbols-outlined text-[18px]">campaign</span>
                        <span>Tahun Ajaran 2026/2027</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-on-surface mb-6 leading-tight">
                        Platform Digital <br class="hidden lg:block"/>
                        <span class="text-primary relative inline-block">
                            Verifikasi Siswa
                            <svg class="absolute w-full h-3 -bottom-1 left-0 text-primary-fixed opacity-60" fill="none" preserveAspectRatio="none" viewBox="0 0 100 10">
                                <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="4"></path>
                            </svg>
                        </span>
                    </h1>
                    <p class="text-lg text-on-surface-variant mb-10 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Selamat datang di portal resmi SMA Negeri 1 Turen. Kami mempermudah proses validasi data diri siswa baru secara digital, aman, dan efisien. Pastikan data Anda akurat untuk keperluan administrasi akademik.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ url('/verifikasi') }}" class="bg-primary text-on-primary text-sm font-semibold px-6 py-4 rounded-lg hover:bg-primary/90 transition-all active:scale-[0.98] shadow-lg flex items-center justify-center gap-3">
                            <span class="material-symbols-outlined">edit_document</span>
                            <span>Daftar Ulang</span>
                        </a>
                        
                        <a href="{{ url('/verifikasi-ijazah') }}" class="bg-surface text-secondary border border-outline-variant text-sm font-semibold px-6 py-4 rounded-lg hover:bg-surface-container transition-all active:scale-[0.98] flex items-center justify-center gap-3 shadow-sm">
                            <span class="material-symbols-outlined text-primary">school</span>
                            <span>Verifikasi Ijazah</span>
                        </a>
                    </div>
                </div>
                
                <div class="flex-1 w-full max-w-lg lg:max-w-none">
                    <div class="bg-surface rounded-2xl p-8 shadow-xl border border-outline-variant/30 relative">
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-8 pb-6 border-b border-outline-variant/30">
                                <div class="w-14 h-14 bg-primary-container text-on-primary-container rounded-xl flex items-center justify-center">
                                    <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">how_to_reg</span>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-on-surface">Verifikasi Data</h3>
                                    <p class="text-sm text-on-surface-variant">Tahap Pengisian Dibuka</p>
                                </div>
                                <div class="ml-auto bg-error-container text-on-error-container px-3 py-1 rounded-full text-xs font-bold animate-pulse">
                                    LIVE
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <div class="text-3xl font-bold text-primary mb-1">1.2K+</div>
                                    <div class="text-sm text-on-surface-variant">Siswa Terdaftar</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-bold text-primary mb-1">100%</div>
                                    <div class="text-sm text-on-surface-variant">Digital &amp; Aman</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-bold text-primary mb-1">11 Bagian</div>
                                    <div class="text-sm text-on-surface-variant">Struktur Form</div>
                                </div>
                                <div>
                                    <div class="text-3xl font-bold text-primary mb-1">24/7</div>
                                    <div class="text-sm text-on-surface-variant">Akses Sistem</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 px-4 md:px-10 bg-surface-container-lowest">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-on-surface mb-4">Proses Verifikasi Mudah</h2>
                    <p class="text-on-surface-variant max-w-2xl mx-auto">Ikuti langkah sederhana ini untuk menyelesaikan proses verifikasi data induk Anda dengan cepat dan aman.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-surface rounded-full border-4 border-surface-container-lowest shadow-md flex items-center justify-center mb-6 relative z-10">
                            <div class="w-20 h-20 bg-primary-container text-on-primary-container rounded-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">edit_document</span>
                            </div>
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-primary text-on-primary rounded-full flex items-center justify-center font-bold text-sm shadow-sm border-2 border-surface-container-lowest">1</div>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface mb-2">Input Data Induk</h3>
                        <p class="text-sm text-on-surface-variant px-4">Lengkapi formulir biodata lengkap dan data wali sesuai dokumen resmi.</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-surface rounded-full border-4 border-surface-container-lowest shadow-md flex items-center justify-center mb-6 relative z-10">
                            <div class="w-20 h-20 bg-primary-container text-on-primary-container rounded-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">upload_file</span>
                            </div>
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-primary text-on-primary rounded-full flex items-center justify-center font-bold text-sm shadow-sm border-2 border-surface-container-lowest">2</div>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface mb-2">Unggah Berkas</h3>
                        <p class="text-sm text-on-surface-variant px-4">Scan dan unggah dokumen pendukung wajib seperti KK dan SKL.</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-surface rounded-full border-4 border-surface-container-lowest shadow-md flex items-center justify-center mb-6 relative z-10">
                            <div class="w-20 h-20 bg-primary-container text-on-primary-container rounded-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">school</span>
                            </div>
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-primary text-on-primary rounded-full flex items-center justify-center font-bold text-sm shadow-sm border-2 border-surface-container-lowest">3</div>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface mb-2">Update Ijazah</h3>
                        <p class="text-sm text-on-surface-variant px-4">Jika nomor ijazah SMP sudah resmi terbit, masukkan lewat portal NISN.</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-surface rounded-full border-4 border-surface-container-lowest shadow-md flex items-center justify-center mb-6 relative z-10">
                            <div class="w-20 h-20 bg-secondary-container text-primary rounded-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">verified</span>
                            </div>
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-primary text-on-primary rounded-full flex items-center justify-center font-bold text-sm shadow-sm border-2 border-surface-container-lowest">4</div>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface mb-2">Review & Selesai</h3>
                        <p class="text-sm text-on-surface-variant px-4">Admin memvalidasi data akhir dan menerbitkan bukti verifikasi resmi.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 px-4 md:px-10 bg-surface">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-on-surface mb-4">Mengapa Verifikasi Digital?</h2>
                    <p class="text-on-surface-variant max-w-2xl mx-auto">Sistem kami dirancang untuk memberikan kenyamanan maksimal sekaligus menjaga keamanan data Anda.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div class="group bg-surface-container-lowest border border-outline-variant/50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                        <div class="w-16 h-16 bg-primary/10 group-hover:bg-primary text-primary group-hover:text-on-primary rounded-xl flex items-center justify-center mb-8 transition-colors duration-300">
                            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">eco</span>
                        </div>
                        <h3 class="text-xl font-bold text-on-surface mb-3">Ramah Lingkungan</h3>
                        <p class="text-on-surface-variant leading-relaxed">Mendukung program sekolah hijau (Adiwiyata) dengan mengurangi penggunaan formulir kertas secara drastis, menuju administrasi paperless.</p>
                    </div>
                    
                    <div class="group bg-surface-container-lowest border border-outline-variant/50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                        <div class="w-16 h-16 bg-primary/10 group-hover:bg-primary text-primary group-hover:text-on-primary rounded-xl flex items-center justify-center mb-8 transition-colors duration-300">
                            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">sync_lock</span>
                        </div>
                        <h3 class="text-xl font-bold text-on-surface mb-3">Keamanan Terpusat</h3>
                        <p class="text-on-surface-variant leading-relaxed">Data yang Anda masukkan dienkripsi dan langsung tersimpan aman dalam database pusat sekolah, mencegah risiko kehilangan dokumen fisik.</p>
                    </div>
                    
                    <div class="group bg-surface-container-lowest border border-outline-variant/50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                        <div class="w-16 h-16 bg-primary/10 group-hover:bg-primary text-primary group-hover:text-on-primary rounded-xl flex items-center justify-center mb-8 transition-colors duration-300">
                            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">contact_support</span>
                        </div>
                        <h3 class="text-xl font-bold text-on-surface mb-3">Bantuan Responsif</h3>
                        <p class="text-on-surface-variant leading-relaxed">Tim admin sekolah siap membantu Anda memecahkan kendala teknis atau pertanyaan seputar data melalui fitur layanan bantuan kami.</p>
                    </div>
                    
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
                        
                        <!-- Logo Website Resmi (Ikon Global Biru Sekolah) -->
                        <a href="https://smanegeri1turen.sch.id" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           title="Website Resmi Sekolah"
                           class="w-11 h-11 bg-white border border-outline-variant/60 rounded-xl flex items-center justify-center transition-all duration-200 shadow-sm hover:shadow-md hover:scale-110 active:scale-95">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                        </a>

                        <!-- Logo WhatsApp (Hijau Resmi Flaticon Style) -->
                        <a href="https://wa.me/6282131067682" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           title="WhatsApp Layanan Info"
                           class="w-11 h-11 bg-white border border-outline-variant/60 rounded-xl flex items-center justify-center transition-all duration-200 shadow-sm hover:shadow-md hover:scale-110 active:scale-95">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.004 2C6.48 2 2 6.48 2 12.004c0 1.848.502 3.577 1.376 5.074L2 22l5.078-1.332a9.941 9.941 0 004.926 1.336c5.524 0 10.004-4.48 10.004-10.004C22.008 6.48 17.528 2 12.004 2zm5.834 14.282c-.244.692-1.216 1.258-1.674 1.32-.424.056-.976.084-2.836-.648-2.378-.936-3.908-3.344-4.026-3.504-.118-.16-1.018-1.352-1.018-2.58 0-1.226.642-1.83.872-2.078.228-.248.5-.31.67-.31h.43c.134 0 .316-.05.494.382.184.446.634 1.544.69 1.658.056.114.092.248.016.4-.076.152-.152.248-.298.42-.148.172-.31.338-.444.492-.15.17-.306.356-.132.654.174.298.772 1.272 1.654 2.056.126.11.238.16.354.212.754.34 1.368.562 1.604.59.39.046.786-.164.992-.44.204-.274.872-1.014.992-1.256.118-.242.238-.204.394-.146s1.004.474 1.176.56c.172.086.288.128.332.204.044.076.044.44-.2.112z" fill="#25D366"/>
                            </svg>
                        </a>

                        <!-- Logo Instagram (Warna Gradasi Estetis) -->
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

                        <!-- Logo E-mail (Merah Pos / Surat Elektronik) -->
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
</body>
</html>