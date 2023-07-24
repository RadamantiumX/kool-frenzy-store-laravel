<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'image_url'=>$this->image ?: null,
            'price'=>$this->price,
            'updated_at'=>(new \DateTime($this->updated_at))->format('d-m-Y H:i:s'),
            'category'=>$this->category,
            'review'=>$this->review,
            'gender'=>$this->gender
        ];
    }
}
