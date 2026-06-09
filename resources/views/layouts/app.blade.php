<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SMA Negeri 1 Turen - Verifikasi Ijazah</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-background text-on-background antialiased">

    {{ $slot }}

    @livewireScripts
</body>
</html>