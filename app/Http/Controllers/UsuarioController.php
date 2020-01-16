<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

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
        return response()->json(Usuario::listarUsuario());
    }

    public function detalleUsuario($id){
        return response()->json(Usuario::mostrarUsuario($id));
    }

    public function eliminarUsuario($id){
        return response()->json(Usuario::borrarUsuario($id));
    }

    public function crearUsuario(){
        $data = request()->all();
        return response()->json(Usuario::crearUsuario($data));
    }

    public function editarUsuario($id){
        $data = request()->all();
        return response()->json(Usuario::actualizarUsuario($data, $id));
    }
}

