<?php

namespace App;

use App\Http\Controllers\UsuarioController;
use DateInterval;
use Illuminate\Database\Eloquent\Model;
use DB;
use DateTime;
use Date;


class Reserva extends Model
{
    protected $table = "Reserva";

    public $timestamps = false;

    protected $fillable = array('codigo', 'fecha_inicio', 'fecha_fin', 'descripcion');

    public function usuarioReserva(){
        return $this->belongsTo('App\User');
    }

    public function regimenReserva(){
            return $this->belongsTo('App\Regimen');
    }

    public function tipoReservaReserva(){
            return $this->belongsTo('App\Tipo_reserva');
    }

    public function sala_conferenciaReserva(){
            return $this->belongsTo('App\Sala_conferencia');
    }

    public function habitacionReserva(){
            return $this->belongsTo('App\Habitacion');
    }

    public static function listarReservaUsuario(String $usuario){
        return DB::table('Reserva')->where('usuario', $usuario)->get();;
    }

    public static function crearReserva(array $data){
        $reserva = new Reserva();
        $reserva->fecha_inicio = $data['fecha_inicio'];
        $reserva->fecha_fin = $data['fecha_fin'];
        $reserva->descripcion = $data['descripcion'];
        $reserva->usuario = $data['usuario'];
        $reserva->habitacion = $data['habitacion'];
        $reserva->sala_conferencia   = $data['sala_conferencia'];
        $reserva->regimen = $data['regimen'];
        $reserva->tipo_reserva = $data['tipo_reserva'];
        $reserva->save();
        /*if(self::compruebaFecha($reserva)) {
            if(self::compruebaUsuario($reserva)){
                $reserva->save();
                return $reserva;
            }else{
                return "No se ha podido crear el usuario";
            }
        }else{
            return "La fecha elegida está reservada";
        }*/
    }

    public static function listarReserva(){
        return Reserva::All();
    }

    //AQUI ES
    public static function obtenerListaReservasFecha(array $data){
        $habitaciones = DB::table('Habitacion')->whereDate('fecha_inicio', '>', $data['fecha_fin'])
            ->orWhereDate('fecha_fin', '<', $data['fecha_inicio'])
            ->get();
        return $habitaciones;
    }

    public static function actualizarReserva(array $data, String $id){
        DB::table('Reserva')
            ->where('codigo', $id)
            ->update($data);
        return DB::table('Reserva')->where('codigo', $data['codigo'])->first();
    }

    public static function borrarReserva(String $id){
        return DB::table('Reserva')->where('codigo', $id)->delete();
    }

    public static function mostrarReserva(String $id){
        return DB::table('Reserva')->where('codigo', $id)->first();
    }

    public static function buscaUsuario(String $id){
        return DB::table('users')->where('email', $id)->first();
    }

    public static function compruebaUsuario(Reserva $reserva){
        $usuario = self::buscaUsuario($reserva->usuario);
        if(!is_null($usuario)){
            return true;
        }else{
            $u = new User();
            $u->email = $reserva->usuario;
            if(is_null(User::registrarUsuario($u))){
                return false;
            }else{
                return true;
            }
        }
    }

    public static function buscaHabitacionReservada(String $id){
        return DB::table('Reserva')->where('habitacion', $id)->get();
    }

    public static function buscaSalaReservada(String $id){
        return DB::table('Reserva')->where('sala_conferencia', $id)->get();
    }

    public static function compruebaFechaReservada($reservas, int $dias, DateTime $inicioReserva){
        $comprobacion = false;
        foreach($reservas as $reserva){
            $inicio = new DateTime($reserva->fecha_inicio);
            $fin = new DateTime($reserva->fecha_fin);

            $diferenciaEntreReserva = $inicioReserva->diff($inicio)->days;
            $diasReserva = $inicio->diff($fin)->days;

            /*Si la diferencia entre reservas es mayor que 0, quiere decir que quedan X días desde el inicio de la
              reserva solicitante hasta la reserva activa. Por tanto habrá que comprobar cuantos días se ha reservado.
              Si la diferencia entre reservas es menor que 0, quiere decir que la reserva solicitante se efectuará una
              vez superado el inicio de la reserva activa. Por tanto habrá que comprobar cuantos días hay de reserva activa.
              Si es 0, la reserva tendrá el mismo día de inicio y no se podrá efectuar.
            */
            if($diferenciaEntreReserva > 0){
                if($diferenciaEntreReserva > $dias){
                    $comprobacion = true;
                }else{
                    $comprobacion = false;
                }
            }else if($diferenciaEntreReserva < 0){
                if(($diferenciaEntreReserva + $diasReserva)  <= 0){
                    $comprobacion = true;
                }else{
                    $comprobacion = false;
                }
            }else if( $diferenciaEntreReserva == 0){
                $comprobacion = false;
            }
        }
        return $comprobacion;
    }

    public static function compruebaFecha(Reserva $reserva){
        $inicio = new DateTime($reserva->fecha_inicio);
        $fin = new DateTime($reserva->fecha_fin);

        $diasReservados = $inicio->diff($fin)->days;
         if(!is_null($reserva->habitacion)) {
            $reservaHabitaciones = self::buscaHabitacionReservada($reserva->habitacion);
            return self::compruebaFechaReservada($reservaHabitaciones, $diasReservados, $inicio);
        }else if(!is_null($reserva->sala_conferencia)){
            $reservaSalas = self::buscaSalaReservada($reserva->sala_conferencia);
            return self::compruebaFechaReservada($reservaSalas, $diasReservados, $inicio);
        }else{
            return "No se ha solicitado habitación ni sala.";
        }
    }

    public static function habitacionesDisponibles($fecha_inicio, $fecha_fin){
 
        $habitaciones = [];
        $from = date($fecha_inicio);
        $to = date($fecha_fin);

        $reservadas = DB::table('habitacion')
            ->join('reserva', 'habitacion.codigo', '=', 'reserva.habitacion')
            ->orWhereBetween('reserva.fecha_inicio', [$fecha_inicio,$fecha_fin])
            ->orWhereBetween('reserva.fecha_fin', [$fecha_inicio,$fecha_fin])
            ->select('habitacion.codigo')
            ->get();

        foreach($reservadas as $i){
            array_push($habitaciones, $i->codigo);
        }

        return DB::table('habitacion')
                        ->whereNotIn('habitacion.codigo', $habitaciones)
                        ->get();

    }

    public static function salasDisponibles($fecha_inicio, $fecha_fin){
 
        $salas = [];
        $from = date($fecha_inicio);
        $to = date($fecha_fin);

        $reservadas = DB::table('sala_conferencia')
            ->join('reserva', 'sala_conferencia.codigo', '=', 'reserva.sala_conferencia')
            ->orWhereBetween('reserva.fecha_inicio', [$fecha_inicio,$fecha_fin])
            ->orWhereBetween('reserva.fecha_fin', [$fecha_inicio,$fecha_fin])
            ->select('sala_conferencia.codigo')
            ->get();

        foreach($reservadas as $i){
            array_push($salas, $i->codigo);
        }

        return DB::table('sala_conferencia')
                        ->whereNotIn('sala_conferencia.codigo', $salas)
                        ->get();

    }

}
