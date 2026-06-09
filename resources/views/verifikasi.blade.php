<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SMA Negeri 1 Turen - Daftar Ulang & Verifikasi Data</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container-highest": "#dae2fd",
                        "on-primary": "#ffffff",
                        "secondary-fixed-dim": "#b7c8e1",
                        "on-tertiary-fixed": "#171c1f",
                        "primary": "#00236f",
                        "inverse-surface": "#283044",
                        "tertiary-container": "#3c4144",
                        "on-tertiary-fixed-variant": "#43474b",
                        "inverse-primary": "#b6c4ff",
                        "tertiary": "#262b2e",
                        "secondary-container": "#d0e1fb",
                        "on-background": "#131b2e",
                        "on-primary-fixed-variant": "#264191",
                        "tertiary-fixed": "#dfe3e7",
                        "primary-container": "#1e3a8a",
                        "on-secondary-fixed": "#0b1c30",
                        "surface-container-lowest": "#ffffff",
                        "surface-bright": "#faf8ff",
                        "secondary": "#505f76",
                        "surface-dim": "#d2d9f4",
                        "error": "#ba1a1a",
                        "on-secondary-fixed-variant": "#38485d",
                        "primary-fixed-dim": "#b6c4ff",
                        "surface-container-high": "#e2e7ff",
                        "tertiary-fixed-dim": "#c3c7cb",
                        "background": "#faf8ff",
                        "on-tertiary-container": "#a8adb1",
                        "secondary-fixed": "#d3e4fe",
                        "outline-variant": "#c5c5d3",
                        "on-secondary-container": "#54647a",
                        "inverse-on-surface": "#eef0ff",
                        "on-primary-container": "#90a8ff",
                        "error-container": "#ffdad6",
                        "surface-variant": "#dae2fd",
                        "on-error": "#ffffff",
                        "surface-container": "#eaedff",
                        "on-primary-fixed": "#00164e",
                        "primary-fixed": "#dce1ff",
                        "on-surface-variant": "#444651",
                        "on-surface": "#131b2e",
                        "outline": "#757682",
                        "on-tertiary": "#ffffff",
                        "on-error-container": "#93000a",
                        "surface-container-low": "#f2f3ff",
                        "surface": "#faf8ff",
                        "on-secondary": "#ffffff",
                        "surface-tint": "#4059aa"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-desktop": "40px",
                        "base": "8px",
                        "margin-mobile": "16px",
                        "gutter": "24px",
                        "container-max": "1280px"
                    },
                    "fontFamily": {
                        "label-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "headline-lg": ["Inter"],
                        "display": ["Inter"],
                        "headline-md": ["Inter"]
                    },
                    "fontSize": {
                        "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "500"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "display": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}]
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #F1F5F9; }
        .stepper-line { width: 2px; position: absolute; left: 11px; top: 24px; bottom: -8px; z-index: 0; }
        .stepper-item:last-child .stepper-line { display: none; }
        .form-card { background: white; border: 1px solid #E2E8F0; box-shadow: 0px 4px 12px rgba(0,0,0,0.05); }
    </style>
</head>
<body class="font-body-md text-on-surface antialiased min-h-screen flex flex-col" x-data="formWizard()">

    <div id="toast-container" class="fixed top-24 right-4 z-[9999] space-y-3 pointer-events-none max-w-sm w-full px-4"></div>

    <header class="bg-surface-container-lowest border-b border-outline-variant shadow-sm w-full z-50 top-0 sticky" x-data="{ mobileMenuOpen: false }">
        <div class="flex justify-between items-center w-full px-4 md:px-10 max-w-7xl mx-auto h-20">
            <div class="flex items-center gap-3 shrink-0">
                <div class="w-11 h-11 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMA Negeri 1 Turen" class="max-w-full max-h-full object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                </div>
                <span class="text-xl md:text-2xl font-bold text-primary tracking-tight" style="font-family: 'Inter', sans-serif;">SMA Negeri 1 Turen</span>
            </div>
            
            <ul class="hidden md:flex gap-8 items-center h-full">
                <li class="h-full flex items-center">
                    <a class="text-sm text-on-surface-variant hover:text-primary transition-colors font-medium pt-1 pb-1 cursor-pointer" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="h-full flex items-center">
                    <a class="text-sm text-primary border-b-2 border-primary font-bold pt-1 pb-1 cursor-pointer" href="{{ url('/verifikasi') }}">Daftar Ulang</a>
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
            
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-on-surface-variant cursor-pointer p-2 rounded-lg hover:bg-surface-container">
                <span class="material-symbols-outlined" x-text="mobileMenuOpen ? 'close' : 'menu'">menu</span>
            </button>
        </div>

        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-surface-container-lowest border-b border-outline-variant px-4 py-4 space-y-3 shadow-inner">
            <a class="block text-sm text-on-surface-variant hover:text-primary font-medium py-1" href="{{ url('/') }}">Beranda</a>
            <a class="block text-sm text-primary font-bold py-1" href="{{ url('/verifikasi') }}">Daftar Ulang</a>
            <a class="block text-sm text-on-surface-variant hover:text-primary font-medium py-1" href="{{ url('/verifikasi-ijazah') }}">Verifikasi Ijazah</a>
            <a class="block text-sm text-on-surface-variant hover:text-primary font-medium py-1" href="#">Bantuan</a>
            <div class="pt-2 border-t border-outline-variant/50">
                <a href="/login" class="w-full bg-surface text-primary border border-outline-variant text-sm font-medium px-4 py-2 rounded-lg hover:bg-surface-container transition-colors flex items-center justify-center gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-[18px]">login</span>
                    Login Admin
                </a>
            </div>
        </div>
    </header>

    <main class="flex-grow flex justify-center py-10 my-2 px-margin-mobile md:px-margin-desktop">
        <div class="max-w-container-max w-full flex flex-col lg:flex-row gap-8">
            
            <aside class="w-full lg:w-72 shrink-0 hidden lg:block">
                <div class="form-card rounded-lg p-6 sticky top-28 max-h-[calc(100vh-10rem)] overflow-y-auto">
                    <h2 class="font-headline-md text-base font-bold mb-6 text-primary tracking-wide">ALUR DAFTAR ULANG</h2>
                    <ul class="relative flex flex-col gap-4">
                        <template x-for="(name, index) in Object.keys(stepNames)">
                            <li class="stepper-item relative pl-8 flex items-start h-7">
                                <div class="stepper-line" :class="currentStep > (parseInt(index)+1) ? 'bg-primary' : 'bg-slate-200'"></div>
                                <div class="absolute left-0 top-0.5 w-6 h-6 rounded-full grid place-items-center z-10 transition-all duration-200"
                                     :class="currentStep > (parseInt(index)+1) ? 'bg-primary text-on-primary' : (currentStep == (parseInt(index)+1) ? 'bg-surface-container-lowest border-2 border-primary' : 'bg-surface-container-lowest border border-outline')">
                                    <span x-show="currentStep > (parseInt(index)+1)" class="material-symbols-outlined text-on-primary text-[14px] font-bold block leading-none">check</span>
                                    <div x-show="currentStep == (parseInt(index)+1)" class="w-2 h-2 bg-primary rounded-full"></div>
                                </div>
                                <span class="font-label-md text-label-md transition-colors duration-200 self-center pl-1"
                                      :class="currentStep == (parseInt(index)+1) ? 'text-primary font-bold' : (currentStep > (parseInt(index)+1) ? 'text-on-surface' : 'text-on-surface-variant')"
                                      x-text="stepNames[parseInt(index)+1]">
                                </span>
                            </li>
                        </template>
                    </ul>
                </div>
            </aside>

            <div class="flex-grow max-w-[840px] w-full">
                
                <div class="lg:hidden form-card rounded-lg p-4 mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-label-md text-label-md font-bold text-primary">Langkah <span x-text="currentStep"></span> dari 11</span>
                        <span class="font-label-md text-label-md text-on-surface-variant" x-text="stepNames[currentStep]"></span>
                    </div>
                    <div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
                        <div class="bg-primary h-full transition-all duration-300" :style="'width: ' + ((currentStep / 11) * 100) + '%'"></div>
                    </div>
                </div>

                <div class="form-card rounded-lg p-6 md:p-8">
                    <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-8 border-b border-surface-container-high pb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-[28px]">edit_note</span>
                        <span x-text="'Daftar Ulang: ' + stepNames[currentStep]"></span>
                    </h1>
                    
                    <form id="formBukuInduk" method="POST" action="/verifikasi/submit" enctype="multipart/form-data" novalidate @submit="clearStorageOnSuccess()">
                        @csrf
                        
                        @if ($errors->any())
                            <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-600 rounded-r-lg shadow-sm">
                                <div class="flex gap-2 items-start">
                                    <span class="material-symbols-outlined text-rose-600 shrink-0 mt-0.5">error</span>
                                    <div>
                                        <h4 class="text-sm font-bold text-rose-800">Waduh, Data Gagal Disimpan!</h4>
                                        <p class="text-xs text-rose-700 mt-1">Silakan periksa kembali beberapa kolom berikut sebelum mengirim ulang:</p>
                                        <ul class="list-disc pl-5 mt-2 text-xs text-rose-700 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-600 rounded-r-lg shadow-sm">
                                <div class="flex gap-2 items-center">
                                    <span class="material-symbols-outlined text-emerald-600 shrink-0">check_circle</span>
                                    <div>
                                        <h4 class="text-sm font-bold text-emerald-800">Berhasil!</h4>
                                        <p class="text-xs text-emerald-700 mt-0.5">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <div id="step-1" x-show="currentStep === 1">@include('partials.steps.step1')</div>
                        <div id="step-2" x-show="currentStep === 2">@include('partials.steps.step2')</div>
                        <div id="step-3" x-show="currentStep === 3">@include('partials.steps.step3')</div>
                        <div id="step-4" x-show="currentStep === 4">@include('partials.steps.step4')</div>
                        <div id="step-5" x-show="currentStep === 5">@include('partials.steps.step5')</div>
                        <div id="step-6" x-show="currentStep === 6">@include('partials.steps.step6')</div>
                        <div id="step-7" x-show="currentStep === 7">@include('partials.steps.step7')</div>
                        <div id="step-8" x-show="currentStep === 8">@include('partials.steps.step8')</div>
                        <div id="step-9" x-show="currentStep === 9">@include('partials.steps.step9')</div>
                        <div id="step-10" x-show="currentStep === 10">@include('partials.steps.step10')</div>
                        <div id="step-11" x-show="currentStep === 11">@include('partials.steps.step11')</div>

                        <div class="flex flex-row justify-between items-center gap-4 mt-10 pt-6 border-t border-surface-container-high">
                            <div>
                                <template x-if="currentStep === 1">
                                    <a href="{{ url('/') }}" @click="localStorage.removeItem('alur_step_terakhir')"
                                       class="bg-surface-container-lowest text-rose-600 border border-rose-200 font-label-md text-label-md px-4 sm:px-5 py-2 rounded-lg hover:bg-rose-50 transition-colors flex items-center gap-1.5 shadow-sm">
                                        <span class="material-symbols-outlined text-[18px]">close</span>
                                        <span class="hidden sm:inline">Batal</span>
                                    </a>
                                </template>

                                <template x-if="currentStep > 1">
                                    <button type="button" 
                                            @click="prevStep()" 
                                            class="bg-surface-container-lowest text-secondary border border-outline-variant font-label-md text-label-md px-4 sm:px-6 py-2 rounded-lg hover:bg-surface-container-low transition-colors flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                                        Kembali
                                    </button>
                                </template>
                            </div>

                            <div>
                                <button type="button" 
                                        x-show="currentStep < 11"
                                        @click="if(validasiMaju($data)) { nextStep(); }" 
                                        class="bg-primary text-on-primary font-label-md text-label-md px-6 sm:px-8 py-2 rounded-lg hover:bg-primary/90 transition-colors flex items-center gap-1.5 shadow-sm">
                                    Lanjutkan
                                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </button>

                                <button type="submit" 
                                        x-show="currentStep === 11"
                                        class="bg-emerald-700 text-white font-label-md text-label-md px-6 sm:px-8 py-2 rounded-lg hover:bg-emerald-800 transition-colors flex items-center gap-1.5 shadow-sm">
                                    Simpan & Kirim
                                    <span class="material-symbols-outlined text-[18px]">done_all</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
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

    <script>
        function toProperCase(str) {
            return str.replace(/\w\S*/g, function(txt) { return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase(); });
        }

        function tampilkanNotifikasi(pesan) {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const toast = document.createElement('div');
            toast.className = "pointer-events-auto bg-white border-l-4 border-rose-600 shadow-xl rounded-xl p-4 flex items-start gap-3 transform translate-x-full opacity-0 transition-all duration-300 ease-out";
            
            toast.innerHTML = `
                <span class="material-symbols-outlined text-rose-600 shrink-0 mt-0.5">error</span>
                <div class="flex-grow">
                    <h4 class="text-sm font-bold text-slate-800">Gagal Melanjutkan!</h4>
                    <p class="text-xs text-slate-600 mt-0.5 leading-relaxed">${pesan}</p>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-slate-400 hover:text-slate-600 transition-colors shrink-0">
                    <span class="material-symbols-outlined text-[18px]">close</span>
                </button>
            `;

            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.remove('translate-x-full', 'opacity-0');
            }, 10);

            setTimeout(() => {
                toast.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => { toast.remove(); }, 300);
            }, 5000);
        }

        function validasiMaju(alpineData) {
            const babakSekarang = alpineData.currentStep;
            const containerBox = document.getElementById(`step-${babakSekarang}`);
            
            if (!containerBox) return true;

            const elemenWajib = containerBox.querySelectorAll("input[required], select[required], textarea[required]");
            
            for (let komponen of elemenWajib) {
                if (komponen.type === "radio") {
                    const namaGrup = komponen.getAttribute("name");
                    const tercentang = containerBox.querySelector(`input[name="${namaGrup}"]:checked`);
                    if (!tercentang) {
                        tampilkanNotifikasi("Anda wajib memilih salah satu opsi pada kolom bertanda bintang (*).");
                        komponen.focus();
                        return false;
                    }
                } 
                else if (komponen.type === "checkbox") {
                    if (!komponen.checked) {
                        tampilkanNotifikasi("Anda wajib menyetujui dan mencentang kotak pernyataan di bagian bawah.");
                        komponen.focus();
                        return false;
                    }
                } 
                else {
                    if (!komponen.value || komponen.value.trim() === "") {
                        const wadahInput = komponen.closest('.space-y-2') || komponen.parentElement;
                        const labelElemen = wadahInput.querySelector('label');
                        const namaKolom = labelElemen ? labelElemen.innerText.replace('*', '').trim() : 'Kolom Isian Wajib';

                        tampilkanNotifikasi(`Kolom "${namaKolom}" tidak boleh dikosongkan.`);
                        komponen.focus();
                        
                        komponen.classList.add('border-rose-500', 'ring-1', 'ring-rose-500');
                        komponen.addEventListener('input', function() {
                            this.classList.remove('border-rose-500', 'ring-1', 'ring-rose-500');
                        }, { once: true });

                        return false;
                    }
                }
            }
            return true;
        }

        // Wizard Controller Core (Hibrid Laravel + LocalStorage Terintegrasi)
        function formWizard() {
            // Evaluasi kondisi error dari sisi server Laravel
            const adaErrorLaravel = {{ $errors->any() ? 'true' : 'false' }};
            const memoriStep = localStorage.getItem('alur_step_terakhir');
            
            let stepTerpilih = 1;
            if (adaErrorLaravel) {
                stepTerpilih = 11;
            } else if (memoriStep) {
                stepTerpilih = parseInt(memoriStep);
            }

            return {
                currentStep: stepTerpilih,
                
                // --- DATA BINDING STEP 1 ---
                nisn: '{{ old("nisn") }}' || '',
                passed_stage: '{{ old("passed_stage") }}' || '',
                is_passed: '{{ old("is_passed") }}' || '',

                // --- DATA BINDING STEP 2 ---
                nama_lengkap: '{{ old("nama_lengkap") }}' || '',
                nik: '{{ old("nik") }}' || '',
                email: '{{ old("email") }}' || '',
                // ... daftarkan properti step lainnya di bawah sini dengan pola yang sama ...

                stepNames: {
                    1: "Konfirmasi Penerimaan",
                    2: "Data Pribadi",
                    3: "Data Ayah",
                    4: "Data Ibu",
                    5: "Data Wali",
                    6: "Tempat Tinggal",
                    7: "Kesehatan",
                    8: "Pendidikan Sebelumnya",
                    9: "Kegemaran & Cita-cita",
                    10: "Data Tambahan",
                    11: "Berkas Pendukung"
                },

                // FUNGSI UTAMA PENYELAMAT DATA (Dijalankan otomatis saat Alpine siap)
                init() {
                    // Paksa isi variabel Alpine dari nilai asli input HTML jika disumpal oleh Laravel old()
                    this.$nextTick(() => {
                        const form = document.getElementById('formBukuInduk');
                        if (!form) return;

                        // Cari semua input teks, select, dan textarea yang memiliki x-model
                        form.querySelectorAll('[x-model]').forEach(elemen => {
                            const modelName = elemen.getAttribute('x-model');
                            
                            if (elemen.type === 'checkbox') {
                                // Khusus checkbox pernyataan
                                if (elemen.hasAttribute('checked') || elemen.checked) {
                                    this[modelName] = '1';
                                }
                            } else if (elemen.value && elemen.value !== '') {
                                // Untuk input text, number, dan select option
                                this[modelName] = elemen.value;
                            }
                        });
                    });
                },

                nextStep() {
                    if (this.currentStep < 11) {
                        this.currentStep++;
                        localStorage.setItem('alur_step_terakhir', this.currentStep);
                    }
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                prevStep() {
                    if (this.currentStep > 1) {
                        this.currentStep--;
                        localStorage.setItem('alur_step_terakhir', this.currentStep);
                    }
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                clearStorageOnSuccess() {
                    if (this.currentStep === 11) {
                        localStorage.removeItem('alur_step_terakhir');
                    }
                }
            }
        }

        function hitungSaudaraBiasa() {
            const k = parseInt(document.getElementById('saudara_kandung')?.value) || 0;
            const t = parseInt(document.getElementById('saudara_tiri')?.value) || 0;
            const a = parseInt(document.getElementById('saudara_angkat')?.value) || 0;
            const target = document.getElementById('label-total-saudara');
            if(target) target.innerText = k + t + a;
        }

        function jalankanCariSekolah(npsn) {
            const targetNama = document.getElementById('nama_smp');
            if(!targetNama) return;
            targetNama.value = "Mencari data sekolah...";
            
            fetch("/check-npsn?npsn=" + npsn)
                .then(res => { if (!res.ok) throw new Error(); return res.json(); })
                .then(res => {
                    targetNama.value = (res && res.success) ? res.nama_sekolah : "NPSN Tidak Terdaftar";
                })
                .catch(() => { targetNama.value = "NPSN Tidak Terdaftar / Luar Area"; });
        }
    </script>
</body>
</html>