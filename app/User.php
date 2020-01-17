<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Hash;
use DB;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'apellidos', 'telefono', 'direccion', 'dni', 'nacionalidad'
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipo_usuario(){
        return $this->belongsTo('App\Tipo_usuario');
    }

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function crearUsuario(array $data){
        $usuario = new User();
        $usuario->email = $data['email'];
        $usuario->name = $data['name'];
        $usuario->apellidos = $data['apellidos'];
        $usuario->telefono = $data['telefono'];
        $usuario->direccion = $data['direccion'];
        $usuario->password = $data['password'];
        $usuario->dni = $data['dni'];
        $usuario->tipo_usuario = $data['tipo_usuario'];
        $usuario->save();
        return $usuario;
    }

    public static function registrarUsuario(User $u){
        $u->name = "sin nombre";
        $u->apellidos = "sin apellidos";
        $u->password = Hash::make("ContraPrueba123");
        $u->save();
        return $u;
    }

    public static function listarUsuario(){
        return User::All();
    }

    public static function actualizarUsuario(array $data, String $id){
        DB::table('users')
            ->where('email', $id)
            ->update($data);
        return DB::table('users')->where('email', $data['email'])->first();
    }

    public static function borrarUsuario(String $id){
        return DB::table('users')->where('email', $id)->delete();
    }

    public static function mostrarUsuario(String $id){
        return DB::table('users')->where('email', $id)->first();
    }
}
