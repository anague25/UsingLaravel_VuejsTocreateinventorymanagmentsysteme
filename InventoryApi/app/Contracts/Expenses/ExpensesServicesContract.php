<?php

namespace App\Contracts\Expenses;

use App\Models\Expense;

interface ExpensesServicesContract
{

    /**
     * @param array $data
     */
    public function create(array $data);


    /**
     * @param Expense $expense
     */
    public function show(Expense $expense);


    public function index();

    /**
     * @param Expense $expense
     * @param array $data
     */
    public function update(Expense $expense, array $data);


    /**
     * @param Expense $expense
     */
    public function delete(Expense $expense);
}
