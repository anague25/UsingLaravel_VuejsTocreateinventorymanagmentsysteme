<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductsImages
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;    
    }

 
    public function productsImages(Product $product, string $pathImage = "products") : Array {
        
        if (!isset($this->data['image'])) {
            // unset($data['image']);
            return $this->data;
        } 

        
            $this->deleteProductsImages($product);
            $this->data['image'] = $this->data['image']->store('images/' . $pathImage, 'public');
            $this->data['image'] = "storage/" . $this->data['image'];
        
            return $this->data;
        
    }

    public function deleteProductsImages(Product $product) : Void {
        
        if ($product->image) {

            $finalUrlImage = Str::replace('storage/', '', $product->image);
            $product->image = $finalUrlImage;
            Storage::disk('public')->delete($product->image);
        }
        
    }


}