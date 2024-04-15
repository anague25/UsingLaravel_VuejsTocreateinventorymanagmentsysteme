<?php

namespace App\Http\Resources\Commands;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommandsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->product_id,
            'CommandQuantity' => $this->CommandQuantity,
        ];
    }
}
