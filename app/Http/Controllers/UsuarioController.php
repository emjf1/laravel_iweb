<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    public function login()
    {
        ///
    }

    public function registro()
    {
        ///
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

