<?php

namespace App\Services\Suppliers;

use App\Models\Supplier;
use Illuminate\Http\Response;
use App\Http\Resources\Suppliers\SuppliersResource;
use App\Contracts\Suppliers\SuppliersServiceContract;
use App\Http\Resources\Suppliers\SuppliersCollection;

class SuppliersServices implements SuppliersServiceContract
{

    /**
     * create an supplier
     * 
     * @param array $data.
     * @return SuppliersResource.
     */
    public function create($data): SuppliersResource
    {
        $image = new SuppliersImages($data);
        $supplier = new Supplier();
        $data = $image->suppliersImages($supplier, $pathImage = 'suppliers');
        return new SuppliersResource(Supplier::create($data));
    }

    /**
     * update an supplier
     * 
     * @param Supplier $supplier.
     * @param array $data.
     * @return SuppliersResource.
     */
    public function update(Supplier $supplier, array $data): SuppliersResource
    {
        $image = new SuppliersImages($data);
        $data = $image->suppliersImages($supplier, $pathImage = 'suppliers');
        return new SuppliersResource($supplier->update($data));
    }


    /**
     * get all suppliers
     * 
     * @return SuppliersCollection.
     */

    public function index(): SuppliersCollection
    {

        return new SuppliersCollection(Supplier::all());
    }


    /**
     * get an supplier
     * @param Supplier $supplier
     * @return SuppliersResource.
     */

    public function show(Supplier $supplier): SuppliersResource
    {
        return new SuppliersResource($supplier);
    }



    /**
     * delete an supplier
     * 
     * @param Supplier $supplier.
     * @return Illuminate\Http\Response.
     */

    public function delete(Supplier $supplier): Response
    {
        $image = new SuppliersImages($data = []);
        $image->deleteSuppliersImages($supplier);
        $supplier->delete();

        return response()->noContent();
    }
}
