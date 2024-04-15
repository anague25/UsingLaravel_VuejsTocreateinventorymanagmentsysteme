<?php

namespace App\Contracts\Suppliers;

use App\Models\Supplier;

interface SuppliersServiceContract 
{

    /**
     * @param array $data
     */
    public function create(array $data);


     /**
     * @param Supplier $supplier
     */
    public function show(Supplier $supplier);


    public function index();

    /**
     * @param Employee $employee
     * @param array $data
     */
    public function update(Supplier $supplier, array $data);


    /**
     * @param Employee $employee
     */
    public function delete(Supplier $supplier);


}

