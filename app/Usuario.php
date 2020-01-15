<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Usuario extends Model
{
    protected $table = "Usuario";

    public $timestamps = false;

    protected $fillable = array('email', 'nombre', 'apellidos', 'telefono', 'direccion', 'contraseña', 'dni', 'nacionalidad');

    public function tipo_usuario(){
        return $this->belongsTo('App\Tipo_usuario');
    }

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public static function crearUsuario(array $data){
        $usuario = new Usuario();
        $usuario->email = $data['email'];
        $usuario->nombre = $data['nombre'];
        $usuario->apellidos = $data['apellidos'];
        $usuario->telefono = $data['telefono'];
        $usuario->direccion = $data['direccion'];
        $usuario->password = $data['password'];
        $usuario->dni = $data['dni'];
        $usuario->tipo_usuario = $data['tipo_usuario'];
        $usuario->save();
        return $usuario;
    }

    public static function mostrarUsuario(Usuario $data){
        $usuario = DB::table('Usuario')->where('email', $data->email)->first();
        return $usuario;
    }

    public function actualizarUsuario(array $data, Usuario $usuario){
        $usuario = DB::table('Usuario')
            ->where('email', $usuario->email)
            ->update($data);
        return $usuario;
    }

    public function borrarUsuario(Usuario $usuario){
        if(DB::table('Usuario')->where('email', $usuario['email'])->delete())
            return true;
        else
            return false;
    }
}
