<?php

namespace App\Http\Controllers\Api\Expenses;

use App\Models\Expense;
use App\Http\Controllers\Controller;
use App\Contracts\Expenses\ExpensesServicesContract;
use App\Http\Requests\Expenses\ExpensesStoreRequest;
use App\Http\Requests\Expenses\ExpensesUpdatesRequest;

class ExpensesController extends Controller
{

    private $expensesService;

    public function __construct(ExpensesServicesContract $expensesService)
    {
        $this->expensesService = $expensesService;
    }

    /**
     * Display a listing of the employees.
     * @return 
     */
    public function index()
    {
      return $this->expensesService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpensesStoreRequest $request)
    {
      return  $this->expensesService->create($request->validated());
    }

    /**
     * Display the specified expense.
     * 
     */
    public function show(Expense $expense)
    {
        return $this->expensesService->show($expense);
    }

    /**
     * Update the specified expense in storage.
     */
    public function update(ExpensesUpdatesRequest $request, Expense $expense)
    {
       return $this->expensesService->update($expense,$request->validated());
    }

    /**
     * Remove the specified expense from storage.
     */
    public function destroy(Expense $expense)
    {
        return $this->expensesService->delete($expense);
    }
}
