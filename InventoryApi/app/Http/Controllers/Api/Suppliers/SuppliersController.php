<?php

namespace App\Http\Controllers\Api\Suppliers;

use App\Contracts\Suppliers\SuppliersServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Suppliers\SuppliersStoreRequest;
use App\Http\Requests\Suppliers\SuppliersUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{

    private $suppliersService;

    public function __construct(SuppliersServiceContract $suppliersService)
    {
        $this->suppliersService = $suppliersService;
    }



   /**
     * Display a listing of the employees.
     * @return 
     */
    public function index()
    {
      return $this->suppliersService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuppliersStoreRequest $request)
    {
      return  $this->suppliersService->create($request->validated());
    }

    /**
     * Display the specified employee.
     * 
     */
    public function show(Supplier $supplier)
    {
        return $this->suppliersService->show($supplier);
    }

    /**
     * Update the specified employee in storage.
     */
    public function update(SuppliersUpdateRequest $request, Supplier $supplier)
    {
       return $this->suppliersService->update($supplier,$request->validated());
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(Supplier $supplier)
    {
        return $this->suppliersService->delete($supplier);
    }
}
