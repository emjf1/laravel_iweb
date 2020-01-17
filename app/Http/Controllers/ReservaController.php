<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;

class ReservaController extends Controller
{
    public function listaReservasUsuario(){
        $usuario = auth()->user();
        return response()->json(Reserva::listarReservaUsuario($usuario->email));
    }

    public function obtenerListaReservasFecha(){
        $data = request()->all();
        return response()->json(Reserva::obtenerListaReservasFecha($data));
    }

    public function listaReserva(){
        return response()->json(Reserva::listarReserva());
    }

    public function detalleReserva($id){
        return response()->json(Reserva::mostrarReserva($id));
    }

    public function eliminarReserva($id){
        return response()->json(Reserva::borrarReserva($id));
    }

    public function crearReserva(){
        $data = request()->all();
        return response()->json(Reserva::crearReserva($data));
    }

    public function editarReserva($id){
        $data = request()->all();
        return response()->json(Reserva::actualizarReserva($data, $id));
    }

    public function mostrarDisponibles(){
        $data = request()->all();
        $tipo = $data['tipo'];
        $fecha_inicio = $data['fecha_inicio'];
        $fecha_fin = $data['fecha_fin'];
        
        if($tipo == 'habitacion'){
            return response()->json(Reserva::habitacionesDisponibles($fecha_inicio, $fecha_fin));
        }

        else{
            return response()->json(Reserva::salasDisponibles($fecha_inicio, $fecha_fin));
        }
    }
}
