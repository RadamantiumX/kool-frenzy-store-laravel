<?php

namespace App\Http\Controllers\Api;
use App\Models\Api\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\SizeSelector;
use App\Http\Controllers\Api\ProductController;

class SizeSelectorController extends Controller
{
    public function getSizesMix()
    {
        return SizeSelector::getSizesMix();
    }

    public function setSizesMix(Product $product,$sizeMix)
    {
        $product->size_mix = $sizeMix;

        $product->save();

        return response('',200);
    }
}
