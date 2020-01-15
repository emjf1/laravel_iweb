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
            DB::table('Tipo_usuario')
                ->where('codigo', $tuser->codigo)
                ->update($data);

            $tuserActualizada = DB::table('Tipo_usuario')->where('codigo', $data['codigo'])->first();
            return $tuserActualizada;
        }

        public function borrarTipo_usuario(Tipo_usuario $tusuario){
            if(DB::table('Tipo_usuario')->where('codigo', $tusuario->codigo)->delete())
                return true;
            else
                return false;
        }

        public static function mostrarTipo_usuario(Tipo_usuario $data){
            $tusuario = Tipo_usuario::where('tipo', '=', $data->tipo);
            return $tusuario;
        }

        public static function listarTipoUsuario(){
            $tusers = Tipo_usuario::all();
            return $tusers;
        }
}
