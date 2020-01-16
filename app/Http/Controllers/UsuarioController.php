<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UsuarioController extends Controller
{
    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'apellidos' => $request->get('apellidos'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    public function listaUsuario(){
        return response()->json(User::listarUsuario());
    }

    public function detalleUsuario($id){
        return response()->json(User::mostrarUsuario($id));
    }

    public function eliminarUsuario($id){
        return response()->json(User::borrarUsuario($id));
    }

    public function crearUsuario(){
        $data = request()->all();
        return response()->json(User::crearUsuario($data));
    }

    public function editarUsuario($id){
        $data = request()->all();
        return response()->json(User::actualizarUsuario($data, $id));
    }
}

