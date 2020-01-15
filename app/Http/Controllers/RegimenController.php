<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegimenController extends Controller
{
    public function listaRegimen()
    {
        $resultado = Regimen::listarRegimen();
        return response()->json($resultado);
    }

    public function detalleRegimen($id)
    {
        $data = new Regimen();
        $data->codigo = $id;

        $resultado =  Regimen::mostrarRegimen($data);
        return response()->json($resultado);
    }

    public function eliminarRegimen($id)
    {
        $regimen = new Regimen();
        $regimen->codigo = $id;

        $resultado = Regimen::borrarRegimen($regimen);
        return response()->json($resultado);
    }

    public function crearRegimen(){
        $data = request()->all();

        $resultado = Regimen::crearRegimen($data);
        return response()->json($resultado);
    }

    public function editarRegimen($id)
    {
        $data = request()->all();

        $regimen = new Regimen();
        $regimen->codigo = $id;

        $resultado = Regimen::actualizarRegimen($data, $regimen);
        return response()->json($resultado);
    }
}
