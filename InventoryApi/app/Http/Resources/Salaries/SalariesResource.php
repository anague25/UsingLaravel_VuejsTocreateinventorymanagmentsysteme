<?php

namespace App\Http\Resources\Salaries;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalariesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'empoyee_id' => $this->empoyee_id,
            'amount' => $this->amount,
            'salaryDate' => $this->salaryDate,
            'salaryMount' => $this->salaryMount,
            'salaryYear' => $this->salaryYear,
        ];
    }
}
