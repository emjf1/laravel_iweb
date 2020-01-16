<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;

class ImagenController extends Controller
{
    public function listaImagen(){
        return response()->json(Imagen::listarImagen());
    }

    public function detalleImagen($id){
        return response()->json(Imagen::mostrarImagen($id));
    }

    public function eliminarImagen($id){
        return response()->json(Imagen::borrarImagen($id));
    }

    public function crearImagen(){
        $data = request()->all();
        return response()->json(Imagen::crearImagen($data));
    }

    public function editarImagen($id){
        $data = request()->all();
        return response()->json(Imagen::actualizarImagen($data, $id));
    }
}
