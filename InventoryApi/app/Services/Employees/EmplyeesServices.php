<?php

namespace App\Services\Employees;

use App\Models\Employee;
use Illuminate\Http\Response;
use App\Http\Resources\Employees\EmployeesResource;
use App\Contracts\Employees\EmployeesServiceContract;
use App\Http\Resources\Employees\EmployeesCollection;

class EmployeesService implements EmployeesServiceContract
{

    /**
     * create an employee
     * 
     * @param array $data.
     * @return EmployeesResource.
     */
    public function create($data):EmployeesResource
    {
        return new EmployeesResource(Employee::create($data));
    }

    /**
     * create an employee
     * 
     * @param Employee $employee.
     * @return EmployeesResource.
     */
    public function update(Employee $employee, array $data):EmployeesResource
    {
        return new EmployeesResource($employee->update($data));
    }


    /**
     * get all employees
     * 
     * @return array.
     */

    public function index():EmployeesCollection
    {
        
        return new EmployeesCollection(Employee::all());
    }


     /**
     * get an employee
     * @param Employee $employee
     * @return EmployeesResource.
     */

     public function show(Employee $employee) : EmployeesResource
     {
         return new EmployeesResource($employee);
     }
 


    /**
     * delete an employee
     * 
     * @param Employee $employee.
     * @return Illuminate\Http\Response.
     */

    public function delete(Employee $employee) : Response
    {
        $employee->delete();
        return response()->noContent();
    }
}


