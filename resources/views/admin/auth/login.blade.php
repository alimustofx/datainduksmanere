<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Karyawan & Admin - SMAN 1 Turen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-slate-100 p-8 space-y-6">
        <div class="text-center space-y-2">
            <div class="inline-flex p-3 bg-indigo-50 text-indigo-600 rounded-xl mb-2">
                <span class="material-symbols-outlined text-[32px]">admin_panel_settings</span>
            </div>
            <h1 class="text-xl font-bold text-slate-800">Sistem Buku Induk</h1>
            <p class="text-sm text-slate-500">Portal Pengelolaan Data Siswa Baru SMAN 1 Turen</p>
        </div>

        @if($errors->any())
            <div class="p-4 bg-rose-50 border border-rose-200 rounded-xl flex items-start gap-3 text-sm text-rose-600">
                <span class="material-symbols-outlined text-[20px] mt-0.5">error</span>
                <div>{{ $errors->first() }}</div>
            </div>
        @endif

        <form action="{{ route('admin.login.proses') }}" method="POST" class="space-y-4">
            @csrf
            
            <div class="space-y-1.5">
                <label for="username" class="text-xs font-semibold text-slate-600 uppercase tracking-wider">Username</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">person</span>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           value="{{ old('username') }}"
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:bg-white transition-all" 
                           placeholder="Masukkan username admin" 
                           required autofocus>
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="password" class="text-xs font-semibold text-slate-600 uppercase tracking-wider">Password</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">lock</span>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-indigo-500 focus:bg-white transition-all" 
                           placeholder="••••••••" 
                           required>
                </div>
            </div>

            <div class="flex items-center justify-between pt-1">
                <label class="flex items-center gap-2 text-sm text-slate-600 cursor-pointer select-none">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded text-indigo-600 border-slate-300 focus:ring-indigo-500">
                    <span>Ingat perangkat ini</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 active:scale-[0.98] text-white font-semibold text-sm rounded-xl transition-all shadow-md shadow-indigo-100 flex items-center justify-center gap-2">
                <span>Masuk Sistem</span>
                <span class="material-symbols-outlined text-[18px]">login</span>
            </button>
        </form>

        <div class="text-center pt-2">
            <a href="/" class="text-xs text-slate-400 hover:text-indigo-600 inline-flex items-center gap-1 transition-all">
                <span class="material-symbols-outlined text-[14px]">arrow_back</span> Kembali ke Halaman Utama
            </a>
        </div>
    </div>

</body>
</html>