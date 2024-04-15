<?php

namespace App\Services\Suppliers;

use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SuppliersImages
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;    
    }

 
    public function suppliersImages(Supplier $supplier, string $pathImage = "suppliers") : Array {
        
        if (!isset($this->data['image'])) {
            // unset($data['image']);
            return $this->data;
        } 

        
            $this->deleteSuppliersImages($supplier);
            $this->data['image'] = $this->data['image']->store('images/' . $pathImage, 'public');
            $this->data['image'] = "storage/" . $this->data['image'];
        
            return $this->data;
        
    }

    public function deleteSuppliersImages(Supplier $supplier) : Void {
        
        if ($supplier->image) {

            $finalUrlImage = Str::replace('storage/', '', $supplier->image);
            $supplier->image = $finalUrlImage;
            Storage::disk('public')->delete($supplier->image);
        }
        
    }


}