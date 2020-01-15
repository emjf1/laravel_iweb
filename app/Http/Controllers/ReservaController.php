<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function listaReserva()
    {
        $resultado = Reserva::listarReserva();
        return response()->json($resultado);
    }

    public function listaReservaUsuario()
    {
        $usuario = "prueba@email.com";
        $resultado = Reserva::listarReservaUsuario($usuario);
        return response()->json($resultado);
    }

    public function detalleReserva($id)
    {
        $data = new Reserva();
        $data->codigo = $id;

        $resultado =  Reserva::mostrarReserva($data);
        return response()->json($resultado);
    }

    public function eliminarReserva($id)
    {
        $reserva = new Reserva();
        $reserva->codigo = $id;

        $resultado = Reserva::borrarReserva($reserva);
        return response()->json($resultado);
    }

    public function crearReserva(){
        $data = request()->all();

        $resultado = Reserva::crearReserva($data);
        return response()->json($resultado);
    }

    public function editarReserva($id)
    {
        $data = request()->all();

        $reserva = new Reserva();
        $reserva->codigo = $id;

        $resultado = Reserva::actualizarReserva($data, $reserva);
        return response()->json($resultado);
    }
}
