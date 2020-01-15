<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Imagen extends Controller
{
    public function detalleImagen($id)
    {
        $data = new Imagen();
        $data->codigo = $id;

        $resultado =  Imagen::mostrarImagen($data);
        return response()->json($resultado);
    }

    public function eliminarImagen($id)
    {
        $imagen = new Imagen();
        $imagen->codigo = $id;

        $resultado = Imagen::borrarImagen($imagen);
        return response()->json($resultado);
    }

    public function crearImagen(){
        $data = request()->all();

        $resultado = Imagen::crearImagen($data);
        return response()->json($resultado);
    }

    public function editarImagen($id)
    {
        $data = request()->all();

        $imagen = new Imagen();
        $imagen->codigo = $id;

        $resultado = Imagen::actualizarImagen($data, $imagen);
        return response()->json($resultado);
    }
}
