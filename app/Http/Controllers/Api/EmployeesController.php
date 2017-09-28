<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeesController extends Controller
{
    protected $model;
    use ApiControllerTrait;
    public function __construct(Employee $model)
    {
        $this->model = $model;
    }
}
