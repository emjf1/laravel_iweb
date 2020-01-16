<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
            'name' => 'Administrator',
            'apellidos' => 'Hola',
            'direccion' => 'hola hola',
            'dni' => '33333',
            'telefono' => 55,
            'tipo_usuario' => 2,
            'nacionalidad' => 'aaaaa',
            
        ]);
    }
}
