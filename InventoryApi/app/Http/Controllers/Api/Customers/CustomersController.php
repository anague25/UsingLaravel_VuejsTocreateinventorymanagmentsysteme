<?php

namespace App\Http\Controllers\Api\Customers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Contracts\Customers\CustomersServiceContract;
use App\Http\Requests\Customers\CustomersStoresRequest;
use App\Http\Requests\Customers\CustomersUpdatesRequest;

class CustomersController extends Controller
{

    private $customersService;

    public function __construct(CustomersServiceContract $customersService)
    {
        $this->customersService = $customersService;
    }

    /**
     * Display a listing of the employees.
     * @return 
     */
    public function index()
    {
        return $this->customersService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomersStoresRequest $request)
    {
        return  $this->customersService->create($request->validated());
    }

    /**
     * Display the specified customer.
     * 
     */
    public function show(Customer $customer)
    {
        return $this->customersService->show($customer);
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(CustomersUpdatesRequest $request, Customer $customer)
    {
        return $this->customersService->update($customer, $request->validated());
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(Customer $customer)
    {
        return $this->customersService->delete($customer);
    }
}
