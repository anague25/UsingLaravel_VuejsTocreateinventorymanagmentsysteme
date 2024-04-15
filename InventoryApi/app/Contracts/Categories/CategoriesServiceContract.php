<?php

namespace App\Contracts\Categories;

use App\Models\Category;

interface CategoriesServiceContract 
{

    /**
     * @param array $data
     */
    public function create(array $data);


     /**
     * @param Category $category
     */
    public function show(Category $employee);


    public function index();

    /**
     * @param Category $category
     * @param array $data
     */
    public function update(Category $employee, array $data);


    /**
     * @param Category $category
     */
    public function delete(Category $employee);


}

