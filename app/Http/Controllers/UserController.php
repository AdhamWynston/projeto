<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required'
        ]);
        $user = new User([
            'name' => $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> bcrypt($request->input('password'))
        ]);
        $user->save();
        return response()->json([
            'message'=> 'Usuário criado com sucesso!'
        ],201);
    }
    public function signin (Request $request)
    {
        $this->validate($request,[
            'email'=> 'required|email',
            'password' => 'required'
        ]);
        $credientials = $request->only('email','password');
        try {
            if(!$token = JWTAuth::attempt($credientials)){
                return response()->json([
                    'error' => 'Por favor, verifique suas credenciais!'
                ], 401);
            }
        } catch (JWTException $e){
            return response()->json([
                'error' => 'Não foi possivel criar o token!'
            ],500);
        }
        return response()->json([
            'token' => $token
        ],200);
    }
}
