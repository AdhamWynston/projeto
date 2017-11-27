<?php

namespace App\Http\Controllers;

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