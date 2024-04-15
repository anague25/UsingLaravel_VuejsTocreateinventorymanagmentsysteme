<?php

namespace App\Services\Categories;

use App\Models\Category;
use Illuminate\Http\Response;
use App\Http\Resources\Categories\CategoriesResource;
use App\Contracts\Categories\CategoriesServiceContract;
use App\Http\Resources\Categories\CategoriesCollection;

class CategoriesServices implements CategoriesServiceContract
{

    /**
     * create an category
     * 
     * @param array $data.
     * @return CategoriesResource.
     */
    public function create($data):CategoriesResource
    {
        $image = new CategoriesImages($data);
        $category = new Category();
        $data = $image->categoriesImages($category , $pathImage='categories');
        return new CategoriesResource(Category::create($data));
    }

    /**
     * update an category
     * 
     * @param Category $category.
     * @return CategoriesResource.
     */
    public function update(Category $category, array $data):CategoriesResource
    {
        $image = new CategoriesImages($data);
        $data = $image->categoriesImages($category , $pathImage='categories');
        return new CategoriesResource($category->update($data));
    }


    /**
     * get all categories
     * 
     * @return array.
     */

    public function index():CategoriesCollection
    {
        
        return new CategoriesCollection(Category::all());
    }


     /**
     * get an category
     * @param Category $category
     * @return CategoriesResource.
     */

     public function show(Category $category) : CategoriesResource
     {
         return new CategoriesResource($category);
     }
 


    /**
     * delete an category
     * 
     * @param Category $category.
     * @return Illuminate\Http\Response.
     */

    public function delete(Category $category) : Response
    {  
        $image = new CategoriesImages($data=[]);
        $image->deleteCategoriesImages($category);
        $category->delete();
        
        return response()->noContent();
    }
}


