<?php

namespace App\Http\Controllers\Api\Employees;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Contracts\Employees\EmployeesServiceContract;
use App\Http\Requests\Employees\EmployeesStoreRequest;
use App\Http\Requests\Employees\EmployeesUpdateRequest;

class EmployeesControlller extends Controller
{

  private $employeesService;

  public function __construct(EmployeesServiceContract $employeesService)
  {
    $this->employeesService = $employeesService;
  }

  /**
   * Display a listing of the employees.
   * @return 
   */
  public function index()
  {
    return $this->employeesService->index();
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(EmployeesStoreRequest $request)
  {
    // dd($request->validated());
    return  $this->employeesService->create($request->validated());
  }

  /**
   * Display the specified employee.
   * 
   */
  public function show(Employee $employee)
  {
    return $this->employeesService->show($employee);
  }

  /**
   * Update the specified employee in storage.
   */
  public function update(EmployeesUpdateRequest $request, Employee $employee)
  {
    return $this->employeesService->update($employee, $request->validated());
  }

  /**
   * Remove the specified employee from storage.
   */
  public function destroy(Employee $employee)
  {
    return $this->employeesService->delete($employee);
  }
}
