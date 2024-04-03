<?php

namespace App\Services\Employees;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmployeesImages
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;    
    }

 
    public function employeesImages(Employee $employee, string $pathImage = "employee") : Array {
        
        if (!isset($this->data['image_url'])) {
            // unset($data['image_url']);
            return $this->data;
        } 

            if ($employee->image_url) {

                $finalUrlImage = Str::replace('storage/', '', $employee->image_url);
                $employee->image_url = $finalUrlImage;
                Storage::disk('public')->delete($employee->image_url);
            }

            $this->data['image_url'] = $this->data['image_url']->store('images/' . $pathImage, 'public');
            $this->data['image_url'] = "storage/" . $this->data['image_url'];
        
            return $this->data;
        
    }


}