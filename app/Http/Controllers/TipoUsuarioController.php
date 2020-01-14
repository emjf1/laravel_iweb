<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_usuario;

class TipoUsuarioController extends Controller
{
    public function listarTipoUsuario(){
        return Tipo_usuario::listarTipoUsuario();
    }

    public function blanco(){
        return "Hola mundo";
    }

    public function crearTipoUsuario( ){
            $data = request()->validate([
                'codigo' => ['required', 'unique:Tipo_usuario,codigo'],
                'tipo' => 'required'
            ], [
                'codigo.required' => 'El campo codigo está mal',
                'tipo.required' => 'El campo tipo está mal'
            ]);
        return Tipo_usuario::crear($data);
    }

    public function detalleTipoUsuario(){
        return Tipo_usuario::leer();
    }

    public function editarTipoUsuario($data, $tuser){
        return Tipo_usuario::actualizar($data, $tuser);
    }

    public function eliminarTipoUsuario($data, $tusuario){
        return Tipo_usuario::borrar($data, $tusuario);
    }

}
