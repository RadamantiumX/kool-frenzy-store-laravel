<style>
 
  .logo-img{
    width: 35px;
    height: 30px;
  }
  .link-nav{
    z-index: 1000;
    
  }
 .collapse{
  visibility: visible;
 }
 .user-name-title{
   color: #d3e3d7;
   font-size: 17px;
 }
 .user-name-title:hover{
   color: #fff;
 }
 .new-user{
   font-size: 17px;
   color: #fff;
 }
 .menu-nav{
  display: none;
 }
 .show{
  display: block;
 }
 @media screen and (max-width: 500px){
  .logo-img{
    width: 28px;
    height: 20px;
    margin-left:-20px ;
  }
}
</style>
<!-- Navbar -->
<nav class="nav-kf bg-gray-800"
x-data="{
        mobileMenuOpen: false,
        cartItemsCount: {{ \App\Helpers\Cart::getCartItemsCount() }},
    }"
    @cart-change.window="cartItemsCount = $event.detail.count"
>
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
       
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
         <a href="{{ route('home') }}"><img class="logo-img block h-8 w-auto lg:hidden" src="https://i.postimg.cc/02nyKYp0/texto-kf-removebg-preview.png" alt="Kool Frenzy Logo"></a>
         <a href="{{ route('home') }}"><img class="logo-img hidden h-8 w-auto lg:block" src="https://i.postimg.cc/02nyKYp0/texto-kf-removebg-preview.png" alt="Kool Frenzy Logo"></a>
        </div>
       
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <a  href="{{ route('cart.index') }}" type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="sr-only">Carrito</span>
          <i class="fa-solid fa-cart-shopping"></i>
   
     <!-- Cart Items Counter -->
     <small
                        x-show="cartItemsCount"
                        x-transition
                        x-text="cartItemsCount"
                        x-cloak
                        class="py-[2px] px-[8px] rounded-full bg-red-500"
                    ></small>
                    <!--/ Cart Items Counter -->


         </a>

        <!-- Profile dropdown -->
        <div class="relative ml-3">
          @if (!Auth::guest())
          <div>
            <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="menuDropDown()">
              <span class="sr-only">Open user menu</span>
               <h3 class="user-name-title">{{ auth()->user()->name }}</h3> 
            </button>
          </div>

         
          <div class="menu-nav absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
            <a href="{{ route('order.index') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Pedidos</a>

            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault();
                                        this.closest('form').submit();">Salir</a>
            </form>
          </div>


          @else 
          <div>
            <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="menuDropDown()">
              <span class="sr-only">Menu de Usuario</span>
              <div class="new-user"><i class="fa-solid fa-user"></i></div>
            </button>
          </div>

          <div class="menu-nav absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Ingresar</a>
            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Registrarse</a>
            
          </div>
         @endif
        </div>



      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->

</nav>


<!-- Navbar -->

<nav class="nav-kf-1 navbar navbar-light bg-light">
  <div class="container-fluid d-flex align-items-center">
    <form class="d-flex input-group w-50">
      <input
        type="search"
        class="form-control rounded w-10"
        placeholder="Buscar - Ej:'Remeras anime'"
        aria-label="Search"
        aria-describedby="search-addon"
      />
      <span class="input-group-text border-0" id="search-addon">
       <a href="#"
       
       > <i class="fas fa-search"></i></a>
      </span>
    </form>

    
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link"  href="#">Remeras</a>
        <a class="nav-link" href="#">Buzos</a>
        <a class="nav-link" href="#">Personalizados</a>
        <a class="nav-link"
          >Diseños</a
        >
      </div>
    </div>

  </div>
</nav>

<script>
  let btn = document.querySelector('.menu-nav');

  function menuDropDown (){
    btn.classList.toggle('show');
  }
</script>