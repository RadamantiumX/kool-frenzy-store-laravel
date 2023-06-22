<style>
.card-p{
    border: solid 1px #b6c2b9;
    border-radius: 10px;
  }
  .boxes{
    padding: 7px;
  }
  .tendence-title{
    font-family: 'Permanent Marker', cursive
  }
  .tendence-section{
    background-image: url('https://i.postimg.cc/Gt2z2tph/18755.jpg');
    background-size: cover;
   background-repeat: no-repeat;
   
   background-position: center;
  }
  
</style>
<x-app-layout>
<?php if ($products->count() === 0): ?>
    <div class="text-center text-gray-600 py-16 text-xl">
         No hay resultados en la busqueda...
    </div>
<?php else: ?>
    <div class="tendence-section bg-gray-100 tendence-section mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="tendence-title text-2xl font-bold tracking-tight text-gray-900">Estas son las últimas tendencias</h2>
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
    @foreach ($products as $product)
    <div class="group relative card-p"
      
      >
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between boxes">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="{{ route('product.view', $product->slug) }}">
                <span aria-hidden="true" class="absolute inset-0"></span>
               {{ substr($product->title,0,8) }}
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-600">{{ substr($product->description,0,8)}} </p>
          </div>
          <p class="text-sm font-medium text-gray-900">${{ $product->price }}</p>
        </div>
        @switch($product->review)
            @case(1)
            <i class="fa-solid fa-star"></i>
              @break

            @case(2)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
              @break

            @case(3)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
              @break 
              
            @case(4)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
              @break

            @case(5)
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
              
              @break   
          
            @default
              <p>Sin calificar</p>
          @endswitch
        <div class="flex justify-between py-3 px-4">
                        <button class="btn-primary" @click="addToCart()">
                            Ver <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
      </div> 
    @endforeach
      </div>
     
      </div>
     
<?php endif; ?> 
</x-app-layout>