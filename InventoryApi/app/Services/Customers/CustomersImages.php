<?php

namespace App\Services\Customers;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CustomersImages
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }


    public function customersImages(Customer $customer, string $pathImage = "customers"): array
    {

        if (!isset($this->data['image'])) {
            // unset($data['image']);
            return $this->data;
        }


        $this->deleteCustomersImages($customer);
        $this->data['image'] = $this->data['image']->store('images/' . $pathImage, 'public');
        $this->data['image'] = "storage/" . $this->data['image'];

        return $this->data;
    }

    public function deleteCustomersImages(Customer $customer): Void
    {

        if ($customer->image) {

            $finalUrlImage = Str::replace('storage/', '', $customer->image);
            $customer->image = $finalUrlImage;
            Storage::disk('public')->delete($customer->image);
        }
    }
}
