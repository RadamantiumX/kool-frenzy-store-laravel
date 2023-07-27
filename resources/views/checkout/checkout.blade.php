<style>
 
@media screen and (max-width: 1400px){

}
@media screen and (max-width: 900px){

}
@media screen and (max-width: 500px){
   .checkout-detail{
      height: 150vh;
      
   }
   
}
</style>

<x-app-layout>
 <div class="checkout-detail">   
 @if ($items)   
 <section class="h-100  ">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
            <h5 class="text-muted mb-0">Detalle del nuevo pedido... Muchas Gracias <span style="color: #a8729a;">{{ auth()->user()->name }}</span>!</h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="small text-muted mb-0">Pedido Nº: {{ $order->id }}</p>
            </div>

            @foreach ($items as $item)
                
            
            <div class="card shadow-0 border mb-4">
              <div class="card-body">
                <div class="row">
                  <!--div class="col-md-2" espacio para foto del producto>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp"
                      class="img-fluid" alt="Phone">
                  </div-->
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0">{{ $item->title }}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">{{ $item->description }}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Talle: {{ $item->size }}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Cant: {{ $item->quantity }}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">$ARS {{ $item->unit_price }}</p>
                  </div>
                </div>
                
               
              </div>
            </div>
          @endforeach

          

        
          </div>
          <div class="card-footer border-0 px-4 py-5"
            style="background-color: #a8729a;  ">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total a pagar: <span class="h2 mb-0 ms-2">$ARS {{$order->total_price}}</span></h5>
           
          </div>
          <!--Boton MP-->
          <div id="button-checkout" ></div>

        </div>
      </div>
    </div>
  </div>
   
</section>
@else
<div>No hay nada aqui... </div>
@endif
</div>
</x-app-layout>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('TEST-bfb7b150-e515-48d2-82e5-b92682f5b60f');
    const bricksBuilder = mp.bricks();
   
    mp.bricks().create("wallet", "button-checkout", {
   initialization: {
       preferenceId: '{{$preferenceId}}',
   },
});

</script>