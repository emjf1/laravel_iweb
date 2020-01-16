<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_usuario;

class TipoUsuarioController extends Controller
{
    public function listaTipoUsuario(){
        return response()->json(Tipo_usuario::listarTipo_Usuario());
    }

    public function crearTipoUsuario(){
            $data = request()->validate([
                'codigo' => ['required', 'unique:Tipo_usuario,codigo'],
                'tipo' => 'required'
            ], [
                'codigo.required' => 'El campo codigo está mal',
                'tipo.required' => 'El campo tipo está mal'
            ]);
        return Tipo_usuario::crearTipo_Usuario($data);
    }

    public function detalleTipoUsuario($id){
        return response()->json(Tipo_usuario::mostrarTipo_usuario($id));
    }

    public function editarTipoUsuario($id){
        return response()->json(Tipo_usuario::actualizarTipo_usuario(request()->all(), $id));
    }

    public function eliminarTipoUsuario($id){
        return response()->json(Tipo_usuario::borrarTipo_usuario($id));
    }

}
