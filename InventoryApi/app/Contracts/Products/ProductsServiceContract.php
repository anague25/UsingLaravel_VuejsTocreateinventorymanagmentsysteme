<?php

namespace App\Contracts\Products;

use App\Models\Product;

interface ProductsServiceContract 
{

    /**
     * @param array $data
     */
    public function create(array $data);


     /**
     * @param Product $product
     */
    public function show(Product $product);


    public function index();

    /**
     * @param Product $product
     * @param array $data
     */
    public function update(Product $product, array $data);


    /**
     * @param Product $product
     */
    public function delete(Product $product);


}

