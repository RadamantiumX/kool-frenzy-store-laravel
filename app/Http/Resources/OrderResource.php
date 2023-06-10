<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Nette\Utils\DateTime;


class OrderResource extends JsonResource
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
            'total_price'=>$this->total_price,
            'status'=>$this->status,
            'created_at'=>(new DateTime($this->created_at))->format('Y-m-d H:i:s')
           ];
    }
}
