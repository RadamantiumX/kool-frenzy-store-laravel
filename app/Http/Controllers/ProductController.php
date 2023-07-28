<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductListResource;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
         ->where('published','=',1)
         ->orderBy('updated_at','desc')
         ->paginate(12);
         return view('product.index',[
            'products'=>$products
         ]);
    }

    public function latest()
    {
        $products = Product::query()
        ->where('published','=',1)
        ->orderBy('updated_at','desc')
        ->take(8)
        ->get();
        return view('product.latest',[
            'products'=>$products
         ]);
    }

    public function view(Product $product)
    {
        $var = "😀";
        

        //Review show whit the product
        $query= DB::table('reviews')
         ->select('rating','message','created_at')
         ->where(['product_id'=>$product->id])
         ->latest()
         ->take(3)
         ->get();
         
        $reviews = ReviewResource::collection($query); 
        
        //Para mostrar en los botones de compartir en redes sociales
        $shareButtons = \Share::page(url('/product/'.$product->slug),'Me gusto este diseño de Kool Frenzy!'.$var)
                  ->facebook()
                  ->linkedin()
                  ->whatsapp()
                  ->twitter()
                  ->pinterest();
        
      
        return view('product.view',['product'=>$product,'reviews'=>$reviews],compact('shareButtons'));
    }

    public function search(Request $request)
    {
        $text = trim($request->input('search')) ;

        $products = DB::table('products')
               ->select('id','title','slug','description','image','description','price')
               ->where('title','LIKE','%'.$text.'%')
               ->orWhere('description','LIKE','%'.$text.'%')
               ->orderBy('title','asc')
               ->paginate(6);
        return view('product.search',compact('products','text'));
    }

    public function category(Request $request)
    {
        $text = trim($request->input('category')) ;

        $products = DB::table('products')
               ->select('id','title','slug','description','image','description','price','review')
               ->where('category','LIKE','%'.$text.'%')
               ->orderBy('title','asc')
               ->paginate(8);
        return view('product.category',compact('products','text'));
    }

    public function tendence()
    {
        $products = DB::table('products')
        ->select('id','title','slug','description','image','description','price','review')
        ->where('review','>=',4)
        ->orderBy('title','asc')
        ->take(8)
        ->get();

        return view('product.tendence',compact('products'));
    }
}
