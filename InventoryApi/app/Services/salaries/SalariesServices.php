<?php

namespace App\Services\Salaries;

use App\Models\Salary;
use Illuminate\Http\Response;
use App\Http\Resources\Salaries\SalariesResource;
use App\Contracts\Salaries\SalariesServiceContract;
use App\Http\Resources\Salaries\SalariesCollection;

class SalariesServices implements SalariesServiceContract
{

    /**
     * create an Salary
     * 
     * @param array $data.
     * @return SalariesResource.
     */
    public function create($data): SalariesResource
    {
        return new SalariesResource(Salary::create($data));
    }

    /**
     * update an Salary
     * 
     * @param Salary $Salary.
     * @return SalariesResource.
     */
    public function update(Salary $Salary, array $data): SalariesResource
    {
        $Salary->update($data);
        return new SalariesResource($Salary);
    }


    /**
     * get all products
     * 
     * @return array.
     */

    public function index(): SalariesCollection
    {

        return new SalariesCollection(Salary::all());
    }


    /**
     * get an Salary
     * @param Salary $Salary
     * @return SalariesResource.
     */

    public function show(Salary $Salary): SalariesResource
    {
        return new SalariesResource($Salary);
    }



    /**
     * delete an Salary
     * 
     * @param Salary $Salary.
     * @return Illuminate\Http\Response.
     */

    public function delete(Salary $Salary): Response
    {
        $Salary->delete();

        return response()->noContent();
    }
}
