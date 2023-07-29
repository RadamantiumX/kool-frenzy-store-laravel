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
 .btn-user{
    border-radius: 10%;
 }
 .user-name-title{
   color: #eb5109;
   font-size: 24px;
   font-weight: bold;
 }
 .user-name-title:hover{
   color: #cc34eb;
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
 .un-show{
  display: none;
 }
 .link-p{
   font-size: 20px;
   font-weight: bold;
   
 }
 .menu-low{
  display: none; 
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
<nav class="nav-kf bg-gray-950"
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
        <a  href="{{ route('cart.index') }}" data-toggle="tooltip" data-placement="bottom" title="Carrito de compras" type="button" class="rounded-full  p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
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
            <button type="button" data-toggle="tooltip" data-placement="bottom" title="Cuenta Kool Frenzy: {{ auth()->user()->name }}" class="btn-user flex p-2  bg-gray-100 hover:bg-gray-800 text-lx focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="menuDropDown()">
              <span class="sr-only">Open user menu</span>
               <h3 class="user-name-title">{{ substr(auth()->user()->name,0,1)  }}</h3> 
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
            <button type="button" data-toggle="tooltip" data-placement="bottom" title="Ingresar con una cuenta o Registrarse" class="flex rounded-full  text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="menuDropDown()">
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

<div class="bg-white">
  
<header >
    <nav class="flex items-center justify-between p-6 lg:px-8 h-5" aria-label="Global">
      <div class="flex lg:flex-1">
        
      </div>
      <div class="flex lg:hidden">
        <button onclick="mDropBar()" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" id="user-button">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
     
      <div class="hidden lg:flex lg:gap-x-12">
      <form method="GET" action="/product/index">
      
      @csrf
      <input type="hidden" name="category" id="category" value="remera"/>
  <button href="#" type="submit" class="text-sm font-semibold leading-6 text-gray-900">Productos</button>
</form>
          
      <form method="GET" action="/product/category">
      
            @csrf
            <input type="hidden" name="category" id="category" value="remera"/>
        <button href="#" type="submit" class="text-sm font-semibold leading-6 text-gray-900">Remeras</button>
      </form>

      <form method="GET" action="/product/category">
            @csrf
            <input type="hidden" name="category" id="category" value="buzo"/>
        <button class="text-sm font-semibold leading-6 text-gray-900">Buzos</button>
      </form>

        <a href="{{route('design')}}" class="text-sm font-semibold leading-6 text-gray-900">Diseños</a>
        <a href="{{route('contact')}}" class="text-sm font-semibold leading-6 text-gray-900">Hablemos</a>

        <form method="GET" action="/product/tendence">
          @csrf
        <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Tendencias</button>
       </form>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        
      </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="menu-low" id="navigate" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div class="fixed inset-0 z-50"></div>
      <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          
          <button id="close-btn" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
          
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
            <form method="GET" action="/product/index">
            <button type="submit" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Productos</button>
            </form>
            <form method="GET" action="/product/tendence">
            <button type="submit" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Tendencias</button>
            </form>
            <form method="GET" action="/product/category">
            @csrf
            <input type="hidden" name="category" id="category" value="remera"/>
              <button href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Remeras</button>
            </form>

            <form method="GET" action="/product/category" class="">
            @csrf
            <input type="hidden" name="category" id="category" value="buzo"/>
              <button href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Buzos</button>
            </form>

              <a href="{{route('design')}}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Diseños</a>
              <a href="{{route('contact')}}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Hablemos</a>
              
            </div>
            <div class="py-6">
              
            </div>
          </div>
        </div>
      </div>
    </div>


  </header>
 
</div>
    <script>
  let menu = document.querySelector('.menu-nav');
  let y = document.getElementById("navigate");

  function menuDropDown(){
      menu.classList.toggle('show');
  }

  function mDropBar() {
  var x = document.getElementById("navigate");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

document.getElementById('close-btn').addEventListener('click',()=>{
   y.style.display = "none";
});


</script>




