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
    <script>
        // Configure Tailwind to use the custom font
        tailwind.config = {
          theme: {
            extend: {
              fontFamily: {
                audiowide: ['Audiowide', 'sans-serif'], // Define the Audiowide font
                poppins: ['Poppins', 'sans-serif']
              },
              backgroundImage: {
                'mibar': "url('/storage/bg.jpg')",
              },
            },
          },
        };
    </script>

</head>
<body>
    <video src="/storage/video-bg.mp4" autoplay muted loop class="fixed top-0 left-0 min-w-full min-h-full z-0"></video>
    <div class="flex flex-col items-center justify-center h-screen min-w-screen overflow-hidden">
        <x-header class="fixed top-0"/>
        <div class="flex flex-col items-center justify-center h-full w-screen z-0">
          {{ $slot }}
        </div>
        <x-nav-bar class="fixed bottom-0 z-90 bottom-0">
        </x-nav-bar>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    @stack('scripts')
</body>
</html>