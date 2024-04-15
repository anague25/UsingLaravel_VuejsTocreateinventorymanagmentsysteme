<?php

namespace App\Services\Expenses;

use App\Models\Expense;
use Illuminate\Http\Response;
use App\Http\Resources\Expenses\ExpensesResource;
use App\Contracts\Expenses\ExpensesServicesContract;
use App\Http\Resources\Expenses\ExpensesCollection;

class ExpensesServices implements ExpensesServicesContract
{

    /**
     * create an expense
     * 
     * @param array $data.
     * @return ExpensesResource.
     */
    public function create($data):ExpensesResource
    {
        return new ExpensesResource(Expense::create($data));
    }

    /**
     * update an expense
     * 
     * @param Expense $expense.
     * @return ExpensesResource.
     */
    public function update(Expense $expense, array $data):ExpensesResource
    {
        $expense->update($data);
        return new ExpensesResource($expense);
    }


    /**
     * get all products
     * 
     * @return array.
     */

    public function index():ExpensesCollection
    {
        
        return new ExpensesCollection(Expense::all());
    }


     /**
     * get an expense
     * @param Expense $expense
     * @return ExpensesResource.
     */

     public function show(Expense $expense) : ExpensesResource
     {
         return new ExpensesResource($expense);
     }
 


    /**
     * delete an expense
     * 
     * @param Expense $expense.
     * @return Illuminate\Http\Response.
     */

    public function delete(Expense $expense) : Response
    {  
        $expense->delete();
        
        return response()->noContent();
    }
}


