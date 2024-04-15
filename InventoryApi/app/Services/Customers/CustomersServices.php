<?php

namespace App\Services\Customers;

use App\Contracts\Customers\CustomersServiceContract;
use App\Models\Customer;
use Illuminate\Http\Response;
use App\Http\Resources\Customers\CustomersResource;
use App\Http\Resources\Customers\CustomersCollection;

class CustomersService implements CustomersServiceContract
{

    /**
     * create an customer
     * 
     * @param array $data.
     * @return CustomersResource.
     */
    public function create($data): CustomersResource
    {
        $image = new CustomersImages($data);
        $customer = new Customer();
        $data = $image->customersImages($customer, $pathImage = 'customers');
        return new CustomersResource(Customer::create($data));
    }

    /**
     * update an customer
     * 
     * @param Customer $customer.
     * @return CustomersResource.
     */
    public function update(Customer $customer, array $data): CustomersResource
    {
        $image = new CustomersImages($data);
        $data = $image->customersImages($customer, $pathImage = 'customers');
        return new CustomersResource($customer->update($data));
    }


    /**
     * get all employees
     * 
     * @return array.
     */

    public function index(): CustomersCollection
    {

        return new CustomersCollection(Customer::all());
    }


    /**
     * get an customer
     * @param Customer $customer
     * @return CustomersResource.
     */

    public function show(Customer $customer): CustomersResource
    {
        return new CustomersResource($customer);
    }



    /**
     * delete an customer
     * 
     * @param Customer $customer.
     * @return Illuminate\Http\Response.
     */

    public function delete(Customer $customer): Response
    {
        $image = new CustomersImages($data = []);
        $image->deleteCustomersImages($customer);
        $customer->delete();

        return response()->noContent();
    }
}
