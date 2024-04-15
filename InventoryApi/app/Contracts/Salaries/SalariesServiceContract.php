<?php

namespace App\Contracts\Salaries;

use App\Models\Salary;

interface SalariesServiceContract 
{

    /**
     * @param array $data
     */
    public function create(array $data);


     /**
     * @param Product $salary
     */
    public function show(Salary $salary);


    public function index();

    /**
     * @param Product $salary
     * @param array $data
     */
    public function update(Salary $salary, array $data);


    /**
     * @param Product $salary
     */
    public function delete(Salary $salary);


}

