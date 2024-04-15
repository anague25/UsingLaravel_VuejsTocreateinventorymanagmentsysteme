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


    public function employeesImages(Employee $employee, string $pathImage = "employees"): array
    {

        if (!isset($this->data['image'])) {
            // unset($data['image']);
            return $this->data;
        }


        $this->deleteEmployeesImages($employee);
        $this->data['image'] = $this->data['image']->store('images/' . $pathImage, 'public');
        $this->data['image'] = "storage/" . $this->data['image'];

        return $this->data;
    }

    public function deleteEmployeesImages(Employee $employee): Void
    {

        if ($employee->image) {

            $finalUrlImage = Str::replace('storage/', '', $employee->image);
            $employee->image = $finalUrlImage;
            Storage::disk('public')->delete($employee->image);
        }
    }
}
