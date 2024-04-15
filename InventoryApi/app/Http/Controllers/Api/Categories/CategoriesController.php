<?php

namespace App\Http\Controllers\Api\Categories;

use App\Contracts\Categories\CategoriesServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoriesStoreRequest;
use App\Http\Requests\Categories\CategoriesUpdateRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    private $categorysService;

    public function __construct(CategoriesServiceContract $categoriesService)
    {
        $this->categorysService = $categoriesService;
    }

    /**
     * Display a listing of the categorys.
     * 
     */
    public function index()
    {
      return $this->categorysService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesStoreRequest $request)
    {
      return  $this->categorysService->create($request->validated());
    }

    /**
     * Display the specified category.
     * 
     */
    public function show(Category $category)
    {
        return $this->categorysService->show($category);
    }

    /**
     * Update the specified category in storage.
     */
    public function update(CategoriesUpdateRequest $request, Category $category)
    {
       return $this->categorysService->update($category,$request->validated());
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        return $this->categorysService->delete($category);
    }
}
