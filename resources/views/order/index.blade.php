<style>
    .order-sections{
        height: 90vh;
    }
    .order-title{
        font-family: 'Permanent Marker', cursive;
    }
    .no-data-box{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .q-box{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<x-app-layout>
<div class="order-sections">   
<div class="container mx-auto lg:w-2/3 p-1">
        <h1 class="order-title text-3xl font-bold mb-2">Mis pedidos</h1>
        @if ($orders->isEmpty())
        <div class="no-data-box">
           <div>Nada por aquí...</div> 

           <img src="https://i.postimg.cc/59P7DyMy/birds-design-removebg-preview.png" alt="Kool Frenzy Birds design" class="img-fluid"/>
           <a class="mt-5 btn bg-indigo-900" href="{{ route('home') }}"><i class="fa-solid fa-play me-2"></i> Empezar...</a>
        </div>
        @else

        <div class="bg-white rounded-lg p-3 overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                <tr class="border-b-2">
                    <th class="text-left p-2">Pedido Nº</th>
                    <th class="text-left p-2">Fecha y hora</th>
                    <th class="text-left p-2">Estado</th>
                    <th class="text-left p-2">SubTotal</th>
                    <th class="text-left p-2">Artículo</th>
                    <th class="text-left p-2">Entrega</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr class="border-b">
                        <td class="py-1 px-2">
                            <a
                                href="{{ route('order.view', $order) }}"
                                class="text-purple-600 hover:text-purple-500"
                            >
                                #{{$order->id}}
                            </a>
                        </td>
                        <td class="py-1 px-2 whitespace-nowrap">{{$order->created_at}}</td>
                        <td class="py-1 px-2">
                            <small class="text-white py-1 px-2 rounded
                                {{$order->isPaid() ? 'bg-emerald-500' : 'bg-gray-400' }}">
                                {{$order->status}}
                            </small
                            >
                        </td>
                        <td class="py-1 px-2">${{$order->total_price}}</td>
                        <td class="py-1 px-2 whitespace-nowrap">{{$order->items()->count()}} item(s)</td>
                        <td class="py-1 px-2 flex gap-2 w-[100px]">
                            @if (!$order->isPaid())
                                <form action="{{ route('cart.checkout-order', $order) }}"
                                      method="POST">
                                    @csrf
                                    <button
                                        class="flex items-center py-1 btn-primary whitespace-nowrap"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                                            />
                                        </svg>
                                        Pay
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $orders->links() }}
        </div>
        @endif
        <div class="q-box mt-20">
            
            <img class="img-fluid" src="https://i.postimg.cc/qvDjXqm5/no-bg-question-icon.png" alt="Question icon Kool Frenzy"/>
            <a class="btn btn-info border-tiel" href="{{ route('contact') }}">¿Preguntas?... Podemos responderlas <i class="fa-regular fa-face-smile"></i></a>
        </div>
    </div>
</div> 
</x-app-layout>

