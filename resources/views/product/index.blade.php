<?php
/** @var \Illuminate\Database\Eloquent\Collection $products */
?>
<style>
  .index-section{
    background-image: url('https://i.postimg.cc/HkxZz8ST/5855.jpg');
   background-size: cover;
   background-repeat: no-repeat
  }
  .img-small-section{
    margin-top: 50px;
  }
  .class-img-box{
    display: flex;
    flex-direction: row;
    justify-content: center;
  }
  .img-class{
    width: 300px;
    height: 200px;
  }
  .product-title{
    font-family: 'Permanent Marker', cursive;
  }
  .card-p{
    border: solid 1px #b6c2b9;
    border-radius: 10px;
  }
  .boxes{
    padding: 7px;
  }

</style>
<x-app-layout>

<?php if ($products->count() === 0): ?>
        <div class="text-center text-gray-600 py-16 text-xl">
            No hay productos publicados <i class="fa-solid fa-face-sad-tear"></i>
        </div>
    <?php else: ?>
<div class="index-section bg-white">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="product-title text-2xl font-bold tracking-tight text-gray-900">Podes elegir lo que mas te gusta...</h2>


   
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
 @foreach($products as $product)
      <div class="group relative card-p"
      x-data="productItem({{ json_encode([
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image,
                        'title' => $product->title,
                        'price' => $product->price,
                        'addToCartUrl' => route('cart.add', $product)
                    ]) }})"
      >
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="{{ $product->image }}" alt="Kool Frenzy Clothes Jersey and T-shirt" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="boxes mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="{{ route('product.view', $product->slug) }}">
                <span aria-hidden="true" class="absolute inset-0"></span>
               {{ $product->title }}
              </a>
             
            </h3>
            <p class="mt-1 text-sm text-gray-500">{{ $product->description }} </p>
          </div>
          <p class="text-sm font-medium text-gray-900">$ARS {{ $product->price }}</p>
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
      
      <!-- More products... -->
@endforeach
    </div>
    

    {{$products->links()}}
    <?php endif; ?>
  </div>
</div>


</x-app-layout>