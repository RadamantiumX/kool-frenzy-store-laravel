<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'image_url'=>$this->image ?: null,
            'price'=>$this->price,
            'published'=>(bool)$this->published,
            'created_at'=> (new \DateTime($this->created_at))->format('d-m-Y H:i:s'),
            'updated_at'=> (new \DateTime($this->updated_at))->format('d-m-Y H:i:s'),
        ];
    }
}
