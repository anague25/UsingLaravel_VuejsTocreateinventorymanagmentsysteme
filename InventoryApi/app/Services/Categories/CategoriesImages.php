<?php

namespace App\Services\Categories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoriesImages
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;    
    }

 
    public function categoriesImages(Category $category, string $pathImage = "categories") : Array {
        
        if (!isset($this->data['image'])) {
            // unset($data['image']);
            return $this->data;
        } 

        
            $this->deleteCategoriesImages($category);
            $this->data['image'] = $this->data['image']->store('images/' . $pathImage, 'public');
            $this->data['image'] = "storage/" . $this->data['image'];
        
            return $this->data;
        
    }

    public function deleteCategoriesImages(Category $category) : Void {
        
        if ($category->image) {

            $finalUrlImage = Str::replace('storage/', '', $category->image);
            $category->image = $finalUrlImage;
            Storage::disk('public')->delete($category->image);
        }
        
    }


}