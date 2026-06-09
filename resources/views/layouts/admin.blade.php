<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SMAN 1 Turen - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#00236f",
                        "primary-container": "#1e3a8a",
                        "background": "#faf8ff",
                        "surface": "#faf8ff",
                        "surface-container-low": "#f2f3ff",
                        "surface-container-high": "#e2e7ff",
                        "surface-container-lowest": "#ffffff",
                        "on-background": "#131b2e",
                        "on-surface": "#131b2e",
                        "on-surface-variant": "#444651",
                        "outline-variant": "#c5c5d3",
                        "error": "#ba1a1a",
                        "status-success": "#10b981",
                        "status-success-bg": "#d1fae5",
                        "status-warning": "#f59e0b",
                        "status-warning-bg": "#fef3c7",
                        "status-error": "#ef4444",
                        "status-error-bg": "#fee2e2"
                    }
                }
            }
        }
    </script>
    @livewireStyles
</head>
<body class="bg-background text-on-background min-h-screen">
    
    {{ $slot }}

    @livewireScripts
</body>
</html>