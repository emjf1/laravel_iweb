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

    public static function listarUsuario(){
        return Usuario::All();
    }

    public static function actualizarUsuario(array $data, String $id){
        DB::table('Usuario')
            ->where('codigo', $id)
            ->update($data);
        return DB::table('Usuario')->where('codigo', $data['codigo'])->first();
    }

    public static function borrarUsuario(String $id){
        return DB::table('Usuario')->where('codigo', $id)->delete();
    }

    public static function mostrarUsuario(String $id){
        return DB::table('Usuario')->where('codigo', $id)->first();
    }
}
