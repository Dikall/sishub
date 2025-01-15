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

    <!-- Styles / Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        // Configure Tailwind to use the custom font
        tailwind.config = {
          theme: {
            extend: {
              fontFamily: {
                audiowide: ['Audiowide', 'sans-serif'], // Define the Audiowide font
              },
            },
          },
        };
    </script>

</head>
<body>
    <div class="flex flex-col items-center justify-center h-screen min-w-screen overflow-hidden">
        <x-header>
        </x-header>
        <div class="flex flex-col items-center justify-center h-full">
          {{ $slot }}
        </div>
        <x-nav-bar>
        </x-nav-bar>
    </div>
</body>
</html>