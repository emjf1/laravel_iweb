<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Usuario extends Model
{

    protected $fillable = array('email', 'nombre', 'apellidos', 'telefono', 'direccion', 'contraseña', 'foto_perfil', 'DNI', 'nacionalidad');

    public function tipo_usuario(){
        return $this->belongsTo('App\Tipo_usuario');
    }

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public static function create(array $data){
        $usuario = new Usuario();
        $usuario->email = $data['email'];
        $usuario->nombre = $data['nombre'];
        $usuario->apellidos = $data['apellidos'];
        $usuario->telefono = $data['telefono'];
        $usuario->direccion = $data['direccion'];
        $usuario->contraseña = $data['contraseña'];
        $usuario->foto_perfil = $data['foto_perfil'];
        $usuario->DNI = $data['DNI'];
        $usuario->nacionalidad = $data['nacionalidad'];
        $usuario->save();
        return $usuario;
    }

    public function update(array $data, Usuario $usuario){
        $usuario->update($data);
        return $usuario;
    }

    public function delete(array $data, Usuario $usuario){
        if($usuario->delete($data))
            return true;
        else
            return false;
    }

    public static function read(Usuario $data){
        $usuario = Usuario::where('email', '=', $data->nombre);
        return $usuario;
    }
}
