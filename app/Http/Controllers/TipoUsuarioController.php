<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_usuario;

class TipoUsuarioController extends Controller
{
    public function listaTipoUsuario(){
        return Tipo_usuario::users();
    }

    public function crearTipoUsuario($data){
        return Tipo_usuario::crear($data);
    }

    public function detalleTipoUsuario($data){
        return Tipo_usuario::leer($data);    
    }

    public function editarTipoUsuario($data, $tuser){
        return Tipo_usuario::actualizar($data, $tuser);
    }

    public function eliminarTipoUsuario($data, $tusuario){
        return Tipo_usuario::borrar($data, $tusuario);
    }

}
