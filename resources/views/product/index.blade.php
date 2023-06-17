<?php
/** @var \Illuminate\Database\Eloquent\Collection $products */
?>
<style>
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
    
  }
  .boxes{
    padding: 7px;
  }

</style>
<x-app-layout>
@include('components.carousel')
<?php if ($products->count() === 0): ?>
        <div class="text-center text-gray-600 py-16 text-xl">
            No hay productos publicados <i class="fa-solid fa-face-sad-tear"></i>
        </div>
    <?php else: ?>
<div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="product-title text-2xl font-bold tracking-tight text-gray-900">Mirá todo lo que ofrecemos</h2>


   
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
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="boxes mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="{{ route('product.view', $product->slug) }}">
                <span aria-hidden="true" class="absolute inset-0"></span>
               {{ substr($product->title,0,8) }}
              </a>
             
            </h3>
            <p class="mt-1 text-sm text-gray-500">{{ substr($product->description,0,8)}} </p>
          </div>
          <p class="text-sm font-medium text-gray-900">${{ $product->price }}</p>
        </div>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
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

@include('components.mid')
</x-app-layout>