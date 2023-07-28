<style>
    .stars-values {
        display: flex;
        flex-direction: row;

    }

    .send-button-review {
        margin-top: 20px;
    }

    .non-comments {
        display: flex;
        flex-direction: column;
        text-align: center;
    }

    .non-comments h4 {
        font-size: 30px;
    }

    .size-box {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;

    }
    .title-article{
        font-family: 'Permanent Marker', cursive;
        font-size: 45px;
    }
    .box-faq{
        display: flex;
        flex-direction: column;
        text-align: center;
        margin: 40px;
    }
    .share-box{
        display: flex;
        flex-direction: column;    
    }
    #social-links ul li{
         display: inline-block;
    }
    #social-links ul li a{
        padding: 5px;
        margin: 2px;
    }
</style>
<x-app-layout>
    <div x-data="productItem({{ json_encode([
                    'id' => $product->id,
                    'slug' => $product->slug,
                    'image' => $product->image,
                    'title' => $product->title,
                    'price' => $product->price,
                    'size_mix'=> $product->size_mix,
                    'addToCartUrl' => route('cart.add', $product)
                ]) }})" class="container mx-auto">
        <div class="grid gap-6 grid-cols-1 lg:grid-cols-5">
            <div class="lg:col-span-3">
                <div x-data="{
                      images: ['{{$product->image}}'],
                      activeImage: null,
                      prev() {
                          let index = this.images.indexOf(this.activeImage);
                          if (index === 0)
                              index = this.images.length;
                          this.activeImage = this.images[index - 1];
                      },
                      next() {
                          let index = this.images.indexOf(this.activeImage);
                          if (index === this.images.length - 1)
                              index = -1;
                          this.activeImage = this.images[index + 1];
                      },
                      init() {
                          this.activeImage = this.images.length > 0 ? this.images[0] : null
                      }
                    }">
                    <div class="relative">
                        <template x-for="image in images">
                            <div x-show="activeImage === image" class="aspect-w-3 aspect-h-2">
                                <img :src="image" alt="Kool frenzy Product" class="w-auto mx-auto" />
                            </div>
                        </template>
                        <a @click.prevent="prev" class="cursor-pointer bg-black/30 text-white absolute left-0 top-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <a @click.prevent="next" class="cursor-pointer bg-black/30 text-white absolute right-0 top-1/2 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex">
                        <template x-for="image in images">
                            <a @click.prevent="activeImage = image" class="cursor-pointer w-[80px] h-[80px] border border-gray-300 hover:border-purple-500 flex items-center justify-center" :class="{'border-purple-600': activeImage === image}">
                                <img :src="image" alt="Kool Frenzy products" class="w-auto max-auto max-h-full" />
                            </a>
                        </template>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <h1 class="title-article text-lg font-semibold">
                    {{$product->title}} 
                </h1>
                



                <!--Stars Values-->

                <!--Mensaje si el mensaje se envio correctamente-->
                @if (session('success'))
                <div class="message-alert alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @else
                <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                    <i class="fa-solid fa-star"></i> Calificar
                </button>
                
                @endif


                <!-- Modal Review-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Como calificarías a este producto?</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form method="POST" action="{{ route('review') }}">
                                    @csrf
                                    <div class="stars-values" x-data="{ rating: 0,labels: ['Muy malo', 'Malo', 'Regular', 'Bueno', 'Excelente'] }">
                                        <template x-for="star in 5">


                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star" class="w-10 h-10 fill-current" :class="{ 'text-yellow-500': star <= rating, 'text-gray-400': star > rating }" @click="rating = star;">
                                                <path d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path>
                                            </svg>
                                        </template>
                                        <template x-if="rating">
                                            <p x-text="'Puntuación: ' +  labels[rating-1]"></p>
                                        </template>

                                        <input type="hidden" x-bind:value="rating" name="rating">
                                    </div>
                                    <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}" />
                                    <label for="message-text" class="col-form-label">Comentario:</label>
                                    <textarea class="form-control" id="message" name="message"></textarea>
                                    <button class="send-button-review btn btn-danger"><i class="fa-solid fa-heart"></i> Enviar</button>
                                </form>


                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Review-->

                <!--Stars Values-->


                <!--Product Details-->
                <div class="text-xl font-bold mb-6">$ARS {{$product->price}}</div>

                <div class="flex items-center justify-between mb-5">
                    <label for="quantity" class="block font-bold mr-4">
                        Cantidad
                    </label>
                    <input type="number" name="quantity" x-ref="quantityEl" value="1" min="1" class="w-32 focus:border-purple-500 focus:outline-none rounded" />

                </div>
                <button @click="!sizeEl ? alert('Selecciona un talle...') : addToCart($refs.quantityEl.value, sizeEl)" class="btn-primary py-4 text-lg flex justify-center min-w-0 w-full mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Añadir al carrito de compras
                </button>
                <div class="share-box">
                    <p class="text-sm">Compartir <i class="fa-solid fa-share-nodes"></i></p>
                    {!!$shareButtons!!}
                </div>
                <div class="mb-6" x-data="{expanded: false}">
                    <div x-show="expanded" x-collapse.min.120px class="text-gray-500 wysiwyg-content">
                        {{ $product->description }}
                    </div>
                    <p class="text-right">
                        <a @click="expanded = !expanded" href="javascript:void(0)" class="text-purple-500 hover:text-purple-700" x-text="expanded ? 'Contraer' : 'Leer más'"></a>
                    </p>
                    <!--Product Details-->

                    <!--Sizes Selector-->
                    <div>
                        <h3 class="text-xlg font-semibold flex justify-center min-w-0 w-full mb-6">Talles disponibles</h3>
                        
                        @switch($product->size_mix)
                        @case('A1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('A2')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('A3')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('A4')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('A5')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('B1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('B2')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('B3')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('B4')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('C1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('C2')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('C3')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('D1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('D2')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('E1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('F1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')" disabled class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('F2')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('F3')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('G1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('G2')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" disabled class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('H1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('I1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')" disabled class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('I2')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')" disabled class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('J1')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')" disabled class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break
                        @case('All')
                        <div class="btn-group  flex justify-center"  aria-label="Basic radio toggle button group">
                            <input type="radio" required  @click="sendOption('S')"  class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="S">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio1">S</label>
                            <input type="radio" required  @click="sendOption('M')"  class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="M">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio2">M</label>
                            <input type="radio" required  @click="sendOption('L')"  class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="L">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio3">L</label>
                            <input type="radio" required  @click="sendOption('XL')"  class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio4">XL</label>
                            <input type="radio" required  @click="sendOption('2XL')"  class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="2XL">
                            <label class="text-light btn btn-outline-secondary btn-success" for="btnradio5">2XL</label>
                        </div>
                        @break

                        @endswitch

    </div>
    <!--Sizes Selector-->



    </div>
    </div>
    </div>
    <div class="box-faq">
    <a href="{{ route('contact') }}"><p><i class="fa-solid fa-circle-question me-2"></i>¿Preguntas? Envianos tu mensaje</p></a>
    </div>
    </div>

    <!--Reviews stars-->
    @if ($reviews->isEmpty())
    <div class="non-comments">
        <h4>No hay reseñas de este artículo... <i class="fa-solid fa-ghost"></i></h4>
        <p>Se el primero en calificarlo...<i class="fa-solid fa-face-smile"></i></p>
    </div>
    @else

    <div class="reviews bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Algunas opiniones acerca de este artículo</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Podes dejarnos tu reseña para poder seguir mejorando nuestro arte... <i class="fa-regular fa-face-kiss-wink-heart"></i></p>
            </div>

            @foreach ($reviews as $review)
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <article class="flex max-w-xl flex-col items-start justify-between">

                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            @switch($review->rating)
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

                            @endswitch
                        </h3>
                        <!--Reviews stars-->

                        <!--Reviews Posts-->
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{$review->message}}</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">

                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">

                                <span class="absolute inset-0"></span>
                                Creado el:

                            </p>
                            <p class="text-gray-600">{{$review->created_at}}</p>
                        </div>
                    </div>
                </article>

                <!-- More posts... -->
            </div>
            @endforeach
        </div>
    </div>
    @endif


</x-app-layout>
<script>

    let sizeEl = '';
    function sendOption(opcion){
        
        sizeEl = opcion;
    }

    function isEmptyField (){
        if(!sizeEl){
            alert('Debes seleccionar un talle primero...')
        }
    }

    document.addEventListener("alpine:init", () => {
        Alpine.data('rating', () => ({
            rating: 0,
            labels: ['Muy malo', 'Malo', 'Regular', 'Bueno', 'Excelente'],

            setRating(star) {
                this.rating = star;



                // Actualiza el campo de entrada oculto con el valor de la valoración seleccionada
                document.querySelector('input[name="rating"]').value = this.rating;


            }
        }));
    });
</script>