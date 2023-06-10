<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductListResource;
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
         ->paginate(8);
         return view('product.index',[
            'products'=>$products
         ]);
    }

    public function view(Product $product)
    {
        return view('product.view',['product'=>$product]);
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
               ->select('id','title','slug','description','image','description','price')
               ->where('category','LIKE','%'.$text.'%')
               ->orderBy('title','asc')
               ->paginate(8);
        return view('product.category',compact('products','text'));
    }
}
