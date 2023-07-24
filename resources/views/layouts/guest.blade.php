<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .guest-bg {
            background-image: linear-gradient(to top, rgba(50, 84, 168, 0.604)0%, rgba(62, 50, 168, 0.604)100%), url('https://i.postimg.cc/MpgK07s2/abstract_dirty_grunge_background.jpg');
            background-position: center;
            background-size: cover;
            height: 100vh;
        }

        .logo-box {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .img-logo-guest {
            width: 200px;
            height: auto;
        }

        .social-box-guest {
            display: flex;
            flex-direction: row;
            align-items: center;
            z-index: 1000;
        }
    </style>
</head>

<body class="guest-bg">

    <div class="font-sans ">
        {{ $slot }}
    </div>
    <div class="logo-box">
       <a href="{{ route('home') }}"><img class="img-logo-guest" src="https://i.postimg.cc/3J2pcLrw/logo.png" alt="Kool Frenzy logo" /></a>
        <div class="social-box-guest">
            <!-- Facebook -->
           
            <i class="fa-brands fa-facebook"></i>
            
            <!-- Instagram -->
           
            <i class="fa-brands fa-instagram"></i>
            
            <!-- Pinterest -->
            
            <i class="fa-brands fa-pinterest"></i>
            
        </div>
    </div>
</body>

</html>