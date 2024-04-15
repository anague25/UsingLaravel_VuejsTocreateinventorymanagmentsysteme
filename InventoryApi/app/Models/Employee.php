<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shopName',
        'email',
        'joiningDate',
        'phone',
        'salary',
        'address',
        'image',

    ];


    public function salaries(): HasOne
    {
        return $this->hasOne(Salary::class);
    }
}
