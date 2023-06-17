<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {

    }
    public function store(Request $request)
    {
         
         
     $request->validate([
        'product_id' => 'required',
        'rating' => 'required|numeric|min:1|max:5',
        'message'=>'nullable'
    ]);
    
    $average = $request->rating ;

    $review = new Review();
    
    $review->product_id = $request->product_id;
    $review->rating = $request->rating;
    $review->message = $request->message;
    $review->save();
   
    //Actualizamos el valor de "review" en productos
    DB::table('products')
     ->where(['id'=>$request->product_id])
     ->update(['review'=>$request->rating]);
    
        
    return redirect()->back()->with('success', '¡Valoración agregada con éxito!... Muchas Gracias');

    }
    public function destroy()
    {

    }
}
