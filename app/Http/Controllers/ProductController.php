<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductListResource;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function search()
    {
        $perPage = request('per_page',6);
        $search = request('search','');
        $sortField = request('sort_field','created_at');
        $sortDirection = request('sort_direction','desc');

        $query = Product::query()
           ->where('title','like',"%{$search}%")
           ->orderBy($sortField,$sortDirection)
           ->paginate($perPage);

        return ProductListResource::collection($query);  
    }
}
