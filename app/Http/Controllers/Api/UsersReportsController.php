<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Models\Event;
use App\Models\ManageEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class UsersReportsController extends Controller
{
    public function reportAll (Request $request) {
        $data = $request->all();
        $this->validate($request,[
            'status'=> 'required'
        ]);
        $status = (array_key_exists('status', $data) && $data['status'] != 'undefined') ? $data['status'] : null;
        if ($status == 2) {
            $users = User::orderBy('name')
                ->get();
        }
        else {
            $users = User::where('status', $status)
                ->orderBy('name')
                ->get();
        }
        view()->share('users', $users);
        $pdf = PDF::loadView('reports.users.all');
        $name = "usuarios-" . Carbon::now() . ".pdf";
        return $pdf->stream($name);
//        return response()->json($users);
    }
}
