<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitacion;

class HabitacionController extends Controller
{
    public function listaHabitacion()
    {
        $resultado = Habitacion::listarHabitaciones();
        return response()->json($resultado);
    }

    public function detalleHabitacion($id)
    {
        $data = new Habitacion();
        $data->codigo = $id;

        $resultado =  Habitacion::mostrarHabitacion($data);
        return response()->json($resultado);
    }

    public function fotosHabitacion($id)
    {
        $data = new Habitacion();
        $data->codigo = $id;

        $resultado = Habitacion::obtenerImagenHabitacion($data);
        return ($resultado);
    }

    public function eliminarHabitacion($id)
    {
        $habitacion = new Habitacion();
        $habitacion->codigo = $id;

        $resultado = Habitacion::borrarHabitacion($habitacion);
        return response()->json($resultado);
    }

    public function crearHabitacion(){
        $data = request()->all();

        $resultado = Habitacion::crearHabitacion($data);
        return response()->json($resultado);
    }

    public function editarHabitacion($id)
    {
        $data = request()->all();

        $habitacion = new Habitacion();
        $habitacion->codigo = $id;

        $resultado = Habitacion::actualizarHabitacion($data, $habitacion);
        return response()->json($resultado);
    }
}
