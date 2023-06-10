<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mercadopago;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Helpers\Cart;
use App\Mail\NewOrderEmail;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use MercadoPago\Item;
use MercadoPago\Payer;
use MercadoPago\Preference;
use MercadoPago\SDK;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{

    /*public function __construct()
    {
        SDK::setAccessToken(config('services.mercadopago.access_token'));
    }*/
    public function checkout(Request $request)
    {
        SDK::setAccessToken(config('services.mercadopago.access_token'));

        $user = $request->user();

        //Clases de MP
        $payer = new Payer();
        $payer->name = $user->name;
        $payer->email = $user->email;
         
        [$products,$cartItems] = Cart::getProductsAndCartItems();

        $orderItems = [];
        $lineItems = [];
        $totalPrice = 0;
        
        foreach ($products as $product){

            $quantity = $cartItems[$product->id]['quantity'] ;
            $totalPrice += $product->price * $quantity;

            //Clases de MP
            $lineItem = new Item();
            $lineItem->id = $product->id;
            $lineItem->title = $product->title;
            $lineItem->description = $product->description;
            $lineItem->quantity = $quantity;
            $lineItem->unit_price = $product->price;       
            $lineItems[] = $lineItem;
          
            //Lista de items con detalle (Sin 'order_id')
             $orderItems[] = [
            'product_id' => $product->id,
            'quantity' => $quantity,
            'unit_price' => $product->price
             ];
        }

        //Creacion de Pedido
        $orderData = [
           'total_price' => $totalPrice,
           'status' => OrderStatus::Unpaid,
           'created_by'=>$user->id,
           'updated_by'=>$user->id
        ];
        
        //Nuevo Registro de Order o Pedido
        $order = Order::create($orderData);

        foreach ($orderItems as $orderItem) {
            $orderItem['order_id'] = $order->id;
            //Un registro de OrderItem por Item Pedido
           OrderItem::create($orderItem);
        }
         
        $paymentData = [
            'order_id' => $order->id,
            'amount' => $totalPrice,
            'status'=> PaymentStatus::Pending,
            'type'=>'cc',
            'created_by'=>$user->id,
            'updated_by'=>$user->id,
            'session_id'=>$user->id    
        ];

        Payment::create($paymentData);

        $preference = new Preference();
        $preference->items = $lineItems;

        $preference->back_urls = array(
            "success" =>  route('checkout.success'),
            "failures"=> route('checkout.failure'),
            "pending"=>route('checkout.pending')
        );
        $preference->auto_return = 'approved';
        
        $preference->payer = $payer;

        $preference->save();
        
        return view('checkout.checkout', [
            'preferenceId' => $preference->id,
            'items'=> $lineItems,
            'order'=> $order
        ]);

    }
    public function success(Request $request)
    {
        $user = $request->user();
        $cart = CartItem::where('user_id', $user->id)->first();
        
          
        
        $cart->delete();

        return view('checkout.success',compact('user'));
    } 
    public function failure(Request $request)
    {
        return view('checkout.failure', ['message' => ""]);
    }

    public function pending(Request $request)
    {
        return view('checkout.pending', ['message' => ""]);
    }
}
