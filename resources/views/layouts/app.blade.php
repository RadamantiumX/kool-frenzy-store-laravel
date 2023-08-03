<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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


<!--Flowbite-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
<!--Flowbite-->


    <title>{{ config('app.name', 'Laravel E-commerce Website') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
        .font-site{
          font-family: 'Permanent Marker', cursive;
        }
        .footer-container {
  padding: 3rem 0;
  background-color: #000;
}
.redes{
    font-size: 1.3rem
}

.footer-content {
  max-width: 1004px;
  width: 100%;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
  align-items: flex-start;
}

.footer-section {
  flex-basis: calc(33.33% - 3rem);
  padding: -1rem;
}

.footer-heading {
  font-weight: bold;
  font-size: 1.25rem;
  color: #4A1D86;
  margin-bottom: 0.8rem;
}


.terms-link:hover {
    color: #4A1D86;
  /* O cualquier otro efecto que desees */
}
.footer-link {
  margin-bottom: 0.5rem;
  color: #d3d3d3;
  text-decoration: none;
  display: block;
}

/* icons */
.hover-effect2 {
  min-height: 126px;

  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hover-effect2 ul {
  padding: 0;
  margin: 0;
  list-style: none;
}

.hover-effect2 ul li {
  display: inline-block;
  margin: 0 10px;
}

.hover-effect2 ul li a {
  font-size: 20px;
  color: #fff;
  line-height: 100px;
  display: inline-block;
  width: 50px;
  height: 50px;
  background: #6A1B9A;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  -webkit-transition: all .6s ease;
  -moz-transition: all .6s ease;
  -ms-transition: all .6s ease;
  -o-transition: all .6s ease;
  transition: all .6s ease;
}

.hover-effect2 ul li:hover a {
  border-radius: 0%;
  background: #6A1B9A;
}


.footer-links {
    color: #d3d3d3;
    margin-top: 3rem;
        display: flex;
        justify-content: space-around;
        align-items: center; /* Centra verticalmente los enlaces */
    }

    .footer-center {
        text-align: center;
    }





/* Estilos para dispositivos móviles */
@media (max-width: 768px) {
  .footer-content {
    flex-direction: column;
    align-items: center;
  }

  .footer-section {
    flex-basis: 100%;
    margin-bottom: 1rem;
    text-align: center;

  }
  .footer-link,
  .footer-link button {
    margin: 0.5rem auto;
  }
  .footer-links {
            flex-direction: column;
            align-items: center;
        }

        .footer-center,
        .footer-right {
            width: 100%; /* Ancho completo en dispositivos móviles */
            margin-bottom: 0.5rem; /* Espaciado inferior en dispositivos móviles */
        }
}
    </style>
</head>
<body>
@include('layouts.navigation')
@include('layouts.header')

<main class="p-5">
    {{ $slot }}
</main>

<a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%mi%próximo%diseño%." class="float" target="_blank">
<i class="fa-brands fa-whatsapp my-float"></i>
</a>

<!-- Toast -->
<div
    x-data="toast"
    x-show="visible"
    x-transition
    x-cloak
    @notify.window="show($event.detail.message)"
    class="fixed w-[400px] left-1/2 -ml-[200px] top-16 py-2 px-4 pb-4 bg-emerald-500 text-white"
>
    <div class="font-semibold" x-text="message"></div>
    <button
        @click="close"
        class="absolute flex items-center justify-center right-2 top-2 w-[30px] h-[30px] rounded-full hover:bg-black/10 transition-colors"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12"
            />
        </svg>
    </button>
    <!-- Progress -->
    <div>
        <div
            class="absolute left-0 bottom-0 right-0 h-[6px] bg-black/10"
            :style="{'width': `${percent}%`}"
        ></div>
    </div>
</div>
<!--/ Toast -->

@include('layouts.instagram')

<!-- Footer -->




<footer class="footer-container">
    <div class="footer-content">
      <div class="footer-section">
         <img src="https://i.postimg.cc/3J2pcLrw/logo.png" class="logo-img-footer" alt="Kool frenzy Logo Footer"/>
        <h3 class="footer-heading font-site">Kool Frenzy</h3>
        <p style="color:#d3d3d3">
          Diseños únicos que no vas a encontrar en cualquier tienda, vos también podes personalizar tu estilo.
        </p>
      </div>

      <div class="footer-section">
        <h4 class="footer-heading font-site">Productos</h4>
        <form action="/product/index" method="GET">
          @csrf
          <button type="submit" class="footer-link">Productos</button>
        </form>
        <form action="/product/category" method="GET">
          @csrf
          <input type="hidden" name="category" id="category" value="remera"/>
          <button type="submit" class="footer-link">Remeras</button>
        </form>
        <form action="/product/category" method="GET">
          @csrf
          <input type="hidden" name="category" id="category" value="buzo"/>
          <button type="submit" class="footer-link">Buzos</button>
        </form>
        <a href="{{route('contact')}}" class="footer-link">Hablemos</a>
        <a href="{{route('design')}}" class="footer-link">Diseños</a>
        <form action="/product/tendence" method="GET">
          @csrf
          <button type="submit" class="footer-link">Tendencias</button>
        </form>
      </div>

      <div class="footer-section">
        <h4 class="footer-heading font-site">Contacto</h4>
        <p style="color:#d3d3d3"><i class="fas fa-home footer-icon mb-3"></i> Buenos Aires, Argentina</p>
        <p style="color:#d3d3d3"><i class="fas fa-envelope footer-icon mb-3"></i> info@example.com</p>
        <p style="color:#d3d3d3"><i class="fas fa-phone footer-icon mb-3"></i> + 01 234 567 88</p>
        <p style="color:#d3d3d3"><i class="fas fa-print footer-icon"></i> + 01 234 567 89</p>
      </div>
    </div>

    <p style="color:#4A1D86" class="text-sm text-gray-500 mt-2 text-center font-site redes ">Todas nuestras redes sociales</p>
    <div class="hover-effect2">
        <ul>
          <li><a href="#." title="Facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#." title="Twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#." title="Google Plus"><i class="fa fa-google-plus"></i></a></li>

        </ul>
      </div>

    <div class="footer-section">
        <!-- ... (contenido anterior) ... -->
        <div class="footer-links container">
            <div class="footer-center">
                <p class="design-by">&copy; 2023 Design by <a class="terms-link" href="https://epsiweb.com/" target="_blank">Epsiweb</a></p>
            </div>
            <div class="footer-right">
                <a href="{{ route('terms') }}" class="terms-link">Términos y Condiciones</a>
            </div>
        </div>
    </div>
  </footer>
<!--/ Footer -->
<!-- MDB -->
<script src="https://kit.fontawesome.com/39f24fdfe8.js" crossorigin="anonymous"></script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
<!-- MDB -->
<!--MercadoPago-->
<script src="https://sdk.mercadopago.com/js/v2"></script>
<!--MercadoPago-->
<!--Flowbite-->
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<!--Flowbite-->
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
