<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_usuario extends Model
{
    protected $table = "Tipo_usuario";

    protected $fillable = array('codigo', 'tipo');

    public $timestamps = false;

    public function users(){
        return $this->hasMany('App\Usuario');
    }

        public static function crearTipo_usuario(array $data){
            $tusuario = new Tipo_usuario();
            $tusuario->codigo = $data['codigo'];
            $tusuario->tipo = $data['tipo'];
            $tusuario->save();
            return $tusuario;
        }

        public function actualizarTipo_usuario(array $data, Tipo_usuario $tuser){
            $tuser->update($data);
            return $tuser;
        }

        public function borrarTipo_usuario(array $data, Tipo_usuario $tusuario){
            if($tusuario->delete($data))
                return true;
            else
                return false;
        }

        public static function leerTipo_usuario(Tipo_usuario $data){
            $tusuario = Tipo_usuario::where('tipo', '=', $data->tipo);
            return $tusuario;
        }

        public static function listarTipoUsuario(){
            $tusers = Tipo_usuario::all();
            return $tusers;
        }
}
