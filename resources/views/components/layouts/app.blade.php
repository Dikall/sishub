<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- Styles / Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              fontFamily: {
                audiowide: ['Audiowide', 'sans-serif'],
                poppins: ['Poppins', 'sans-serif']
              },
              backgroundImage: {
                'mibar': "url('/storage/bg.jpg')",
              },
            },
          },
        };
    </script>
    @livewireStyles
</head>
<body>
    <video src="/storage/video-bg.mp4" autoplay muted loop class="fixed top-0 left-0 min-w-full min-h-full z-0"></video>
    
    <div class="flex flex-col items-center justify-center h-screen w-screen overflow-hidden">
        <!-- Prevent Livewire from re-rendering header -->
        <div wire:ignore wire:key="header" class="w-full h-20 z-90 sticky top-0">
            <x-header class="fixed top-0 w-full h-20 z-90 sticky top-0"/>
        </div>

        <div class="flex flex-col items-center justify-center w-full h-full z-10">
            <div class="w-full h-full px-4" wire:key="main-content">
              {{ $slot }}
            </div>
        </div>

        <!-- Prevent Livewire from re-rendering navbar -->
        <div wire:ignore wire:key="navbar">
            <x-nav-bar class="fixed bottom-0 z-90"/>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts 
    @stack('scripts')
</body>
</html>
