<?php

namespace App\Http\Controllers\Api;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderListResource;
use App\Http\Resources\OrderResource;
use App\Mail\OrderUpdateEmail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = request('per_page',10);
        $search = request('search','');
        $sortField = request('sort_field','updated_at');
        $sortDirection = request('sort_direction','desc');

        $query = Order::query()
         ->where('id','like',"%{$search}%")
         ->orderBy($sortField,$sortDirection)
         ->paginate($perPage);


       return OrderListResource::collection($query);  
    }

   


    /**
     * Display the specified resource.
     */
    public function view(Order $order)
    {
        
        return new OrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getStatuses()
    {
        return OrderStatus::getStatuses();
    }

    /**
     * Update the specified resource in storage.
     */
    public function changeStatus(Order $order, $status)
    {
        $order->status = $status;

        $order->save();

        Mail::to($order->user)->send(new OrderUpdateEmail($order));

        return response('',200);
    }

    /**
     * Remove the specified resource from storage.
     */
    
}
