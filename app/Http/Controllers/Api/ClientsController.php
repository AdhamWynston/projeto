<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\Client;


class ClientsController extends Controller
{
    protected $model;
    use ApiControllerTrait;
    public function __construct(Client $model)
    {
        $this->model = $model;
    }
}
