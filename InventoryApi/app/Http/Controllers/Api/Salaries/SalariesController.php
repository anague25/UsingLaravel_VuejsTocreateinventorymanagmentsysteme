<?php

namespace App\Http\Controllers\Api\Expenses;

use App\Models\Salary;
use App\Http\Controllers\Controller;
use App\Contracts\Salaries\SalariesServiceContract;
use App\Http\Requests\Salaries\SalariesStoresRequest;
use App\Http\Requests\Salaries\SalariesUpdatesRequest;

class SalariesController extends Controller
{

  private $salariesService;

  public function __construct(SalariesServiceContract $salariesService)
  {
    $this->salariesService = $salariesService;
  }

  /**
   * Display a listing of the employees.
   * @return 
   */
  public function index()
  {
    return $this->salariesService->index();
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(SalariesStoresRequest $request)
  {
    return  $this->salariesService->create($request->validated());
  }

  /**
   * Display the specified salary.
   * 
   */
  public function show(Salary $salary)
  {
    return $this->salariesService->show($salary);
  }

  /**
   * Update the specified salary in storage.
   */
  public function update(SalariesUpdatesRequest $request, Salary $salary)
  {
    return $this->salariesService->update($salary, $request->validated());
  }

  /**
   * Remove the specified salary from storage.
   */
  public function destroy(Salary $salary)
  {
    return $this->salariesService->delete($salary);
  }
}
