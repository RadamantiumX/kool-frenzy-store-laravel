<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'total_price' => $this->total_price,
            'number_of_items' => $this->items()->count(),
            'customer' => [
                'id' => $this->user->id,
                //Por ahora estan comentados porque tengo q poner un condicional si estan null
                //'first_name' => $this->user->customer->first_name,
                //'last_name' => $this->user->customer->last_name,
            ],
            'created_at' => (new \DateTime($this->created_at))->format('d-m-Y H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('d-m-Y H:i:s'),
        ];
    }
}
