<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitacion;

class HabitacionController extends Controller
{
    public function listaHabitacion(){
        return response()->json(Habitacion::listarHabitaciones());
    }

    public function detalleHabitacion($id){
        return response()->json(Habitacion::mostrarHabitacion($id));
    }

    public function fotosHabitacion($id){
        return response()->json(Habitacion::obtenerImagenHabitacion($id));
    }

    public function eliminarHabitacion($id){
        return response()->json(Habitacion::borrarHabitacion($id));
    }

    public function crearHabitacion(){
        $data = request()->all();
        return response()->json(Habitacion::crearHabitacion($data));
    }

    public function editarHabitacion($id){
        $data = request()->all();
        return response()->json(Habitacion::actualizarHabitacion($data, $id));
    }
}
