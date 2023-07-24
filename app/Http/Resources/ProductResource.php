<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;
use Nette\Utils\DateTime;

class ProductResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'image'=>$this->image ?: null,
            'price'=>$this->price,
            'published'=>(bool)$this->published,
            'created_at'=> (new DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at'=> (new DateTime($this->updated_at))->format('Y-m-d H:i:s'),
            'review' =>$this->review,
            'category'=>$this->category,
            'size_mix'=>$this->size_mix,
            'gender'=>$this->gender
            
        ];
    }
}
