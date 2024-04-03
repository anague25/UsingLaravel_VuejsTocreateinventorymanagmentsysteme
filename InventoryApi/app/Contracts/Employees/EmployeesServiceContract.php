<?php

namespace App\Contracts\Employees;

use App\Models\Employee;

interface EmployeesServiceContract 
{

    /**
     * @param array $data
     */
    public function create(array $data);


     /**
     * @param Employee $employee
     */
    public function show(Employee $employee);


    public function index();

    /**
     * @param Employee $employee
     * @param array $data
     */
    public function update(Employee $employee, array $data);


    /**
     * @param Employee $employee
     */
    public function delete(Employee $employee);


}

