<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ApiControllerTrait {

    function checkEmail($email, $id) {

        $result = $this->model->where('email','=',$email)
            ->where('id','<>',$id)
            ->count();

        if ($result) {
            return response()->json(false);
        }
        return response()->json(true);
    }
    function checkName(Request $request) {
        $this->validate($request,[
            'name' => 'string|required'
        ]);
        $data = $request->all();
        $check = $this->model->where('name', $data['name'])
            ->count();
        if ($check) {
            return response()->json(true);
        }
        return response()->json(false);
    }
    function checkDocument($document, $id) {

        $result = $this->model->where('document','=',$document)
            ->where('id','<>',$id)
            ->count();

        if ($result) {
            return response()->json(false);
        }
        return response()->json(true);
    }
}