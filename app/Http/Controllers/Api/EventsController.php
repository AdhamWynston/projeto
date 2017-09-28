<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $model;
    protected $relationships=['client'];

    use ApiControllerTrait;
    public function __construct(Event $model)
    {
        $this->model = $model;
    }
}
