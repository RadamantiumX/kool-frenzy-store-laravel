<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@200;500&family=Roboto:wght@300;400;500;900&display=swap" rel="stylesheet">
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"
  rel="stylesheet"
/>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .guest-bg {
            background-image: linear-gradient(to top, rgba(50, 84, 168, 0.604)0%, rgba(62, 50, 168, 0.604)100%), url('https://i.postimg.cc/sXY4HZX1/19449870.jpg');
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
            width: 100px;
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
           
           <a href="#"> <i class="text-light fa-brands fa-facebook me-3"></i></a>
            
            <!-- Instagram -->
           
            <a href="#"> <i class="text-light fa-brands fa-instagram me-3"></i></a>
            
            <!-- Pinterest -->
            
            <a href="#"> <i class="text-light fa-brands fa-pinterest me-3"></i></a>
            
        </div>
    </div>


    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
<!-- MDB -->

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>

</html>