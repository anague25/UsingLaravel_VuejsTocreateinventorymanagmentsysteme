<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Http\Response;
use App\Http\Resources\Products\ProductsResource;
use App\Contracts\Products\ProductsServiceContract;
use App\Http\Resources\Products\ProductsCollection;

class EmployeesService implements ProductsServiceContract
{

    /**
     * create an product
     * 
     * @param array $data.
     * @return ProductsResource.
     */
    public function create($data):ProductsResource
    {
        $image = new ProductsImages($data);
        $product = new Product();
        $data = $image->productsImages($product , $pathImage='employees');
        return new ProductsResource(Product::create($data));
    }

    /**
     * update an product
     * 
     * @param Product $product.
     * @return ProductsResource.
     */
    public function update(Product $product, array $data):ProductsResource
    {
        $image = new ProductsImages($data);
        $data = $image->productsImages($product , $pathImage='employees');
        return new ProductsResource($product->update($data));
    }


    /**
     * get all products
     * 
     * @return array.
     */

    public function index():ProductsCollection
    {
        
        return new ProductsCollection(Product::all());
    }


     /**
     * get an product
     * @param Product $product
     * @return ProductsResource.
     */

     public function show(Product $product) : ProductsResource
     {
         return new ProductsResource($product);
     }
 


    /**
     * delete an product
     * 
     * @param Product $product.
     * @return Illuminate\Http\Response.
     */

    public function delete(Product $product) : Response
    {  
        $image = new ProductsImages($data=[]);
        $image->deleteProductsImages($product);
        $product->delete();
        
        return response()->noContent();
    }
}


