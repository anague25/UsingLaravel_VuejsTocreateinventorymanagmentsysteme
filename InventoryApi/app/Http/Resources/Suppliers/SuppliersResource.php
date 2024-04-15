<?php

namespace App\Http\Resources\Suppliers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuppliersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'shopName' => $this->shopName,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'image' => $this->image,
        ];
    }
}
