<?php

namespace App\Contracts\Customers;

use App\Models\Customer;

interface CustomersServiceContract
{

    /**
     * @param array $data
     */
    public function create(array $data);


    /**
     * @param Customer $customer
     */
    public function show(Customer $customer);


    public function index();

    /**
     * @param Customer $customer
     * @param array $data
     */
    public function update(Customer $customer, array $data);


    /**
     * @param Customer $customer
     */
    public function delete(Customer $customer);
}
