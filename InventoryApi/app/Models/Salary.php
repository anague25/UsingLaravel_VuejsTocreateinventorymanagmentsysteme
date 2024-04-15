<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'salaryDate',
        'salaryMonth',
        'salaryYear',
        'employee_id',
    ];

    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
