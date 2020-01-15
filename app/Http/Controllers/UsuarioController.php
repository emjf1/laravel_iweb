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

    public function listaUsuario()
    {
        $resultado = Usuario::listarUsuarios();
        return response()->json($resultado);
    }

    public function infoUsuario($id)
    {
        $data = new Usuario();
        $data->email = $id;

        $resultado =  Usuario::mostrarUsuario($data);
        return response()->json($resultado);
    }

    public function crearUsuario()
    {
        $data = request()->all();

        $resultado = Usuario::crearUsuario($data);
        return response()->json($resultado);
    }

    public function editarUsuario($id)
    {
        $data = request()->all();

        $usuario = new Usuario();
        $usuario->email = $id;

        $resultado = Usuario::actualizarUsuario($data, $usuario);
        return response()->json($resultado);
    }

    public function eliminarUsuario($id)
    {
        $usuario = new Usuario();
        $usuario->codigo = $id;
  
        $resultado = Usuario::borrarUsuario($usuario);
        return response()->json($resultado);
    }

}

