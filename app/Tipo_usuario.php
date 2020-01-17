<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tipo_usuario extends Model
{
    protected $table = "tipo_usuario";

    protected $fillable = array('codigo', 'tipo');

    public $timestamps = false;

    public function users(){
        return $this->hasMany('App\User');
    }

        public static function crearTipo_usuario(array $data){
            $tusuario = new Tipo_usuario();
            $tusuario->tipo = $data['tipo'];
            $tusuario->save();
            return $tusuario;
        }

        public static function actualizarTipo_usuario(array $data, String $id){
            DB::table('Tipo_usuario')
                ->where('codigo', $id)
                ->update($data);
            return DB::table('Tipo_usuario')->where('codigo', $data['codigo'])->first();
        }

        public static function borrarTipo_usuario(String $id){
            return DB::table('Tipo_usuario')->where('codigo', $id)->delete();

        }

        public static function mostrarTipo_usuario(String $id){
            return DB::table('Tipo_usuario')->where('codigo', $id)->first();;
        }

        public static function listarTipo_Usuario(){
            return Tipo_usuario::all();
        }
}
