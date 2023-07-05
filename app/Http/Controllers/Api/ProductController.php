<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Api\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index()
    {
        $perPage = request('per_page',10);
        $search = request('search','');
        $sortField = request('sort_field','created_at');
        $sortDirection = request('sort_direction','desc');

        $query = Product::query()
           ->where('title','like',"%{$search}%")
           ->orderBy($sortField,$sortDirection)
           ->paginate($perPage);

        return ProductListResource::collection($query);   
    }


    public function store(ProductRequest $request)
    {
         $data = $request->validated();
         $data['created_by'] = $request->user()->id;
         $data['updated_by'] = $request->user()->id;

         $image = $data['image'] ?? null;

         if($image){
            $relativePath = $this->saveImage($image);
            $data['image'] = URL::to(Storage::url($relativePath));
            $data['image_mime'] = $image->getClientMimeType();
            $data['image_size'] = $image->getSize();
         }

         $product = Product::create($data);
         return new ProductResource($product);
    }

    public function show(Product $product)
    {
        
        return new ProductResource($product);

    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['updated_by'] = $request->user()->id;

        $image = $data['image'] ?? null;

        if($image){
            $relativePath = $this->saveImage($image);
            $data['image'] = URL::to(Storage::url($relativePath));
            $data['image_mime'] = $image->getClientMimeType();
            $data['image_size'] = $image->getSize();

            if($product->image){
                Storage::deleteDirectory('/public/',dirname($product->image));
            }
        }

        $product->update($data);

        return new ProductResource($product);

        
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }

    public function saveImage(UploadedFile $image)
    {
        $path = 'images/'.Str::random();
        if(!Storage::exists($path)){
            Storage::makeDirectory($path,0755, true);
        }
        if(!Storage::putFileAs('public/'.$path,$image,$image->getClientOriginalName())){
            throw new \Exception("Unable to save file \"{$image->getClientOriginalName()}\"");
        }

        return $path.'/'.$image->getClientOriginalName();
    }
}
