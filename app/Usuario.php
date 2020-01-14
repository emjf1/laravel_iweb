<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Usuario extends Model
{
    protected $table = "Usuario";

    public $timestamps = false;

    protected $fillable = array('email', 'nombre', 'apellidos', 'telefono', 'direccion', 'contraseña', 'foto_perfil', 'DNI', 'nacionalidad');

    public function tipo_usuario(){
        return $this->belongsTo('App\Tipo_usuario');
    }

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public static function crear(array $data){
        $usuario = new Usuario();
        $usuario->email = $data['email'];
        $usuario->nombre = $data['nombre'];
        $usuario->apellidos = $data['apellidos'];
        $usuario->telefono = $data['telefono'];
        $usuario->direccion = $data['direccion'];
        $usuario->password = $data['password'];
        $usuario->foto_perfil = $data['foto_perfil'];
        $usuario->DNI = $data['DNI'];
        $usuario->tipo_usuario = $data['tipo_usuario'];
        $usuario->save();
        return $usuario;
    }

    public function actualizar(array $data, Usuario $usuario){
        $usuario->update($data);
        return $usuario;
    }

    public function borrar(array $data, Usuario $usuario){
        if($usuario->delete($data))
            return true;
        else
            return false;
    }

    public static function leer(Usuario $data){
        $usuario = Usuario::where('email', '=', $data->nombre);
        return $usuario;
    }
}
