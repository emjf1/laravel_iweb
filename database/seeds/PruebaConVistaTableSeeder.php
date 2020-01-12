<?php

use Illuminate\Database\Seeder;

class PruebaConVistaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Borramos los datos de la tabla
         DB::table('pruebas')->delete();
        
         // Añadimos entradas a esta tabla
         DB::table('pruebas')->insert([
            'id' => '1',
            'name' => 'Pepito']);
        DB::table('pruebas')->insert([
            'id' => '2',
            'name' => 'Jaimito']);
        DB::table('pruebas')->insert([
            'id' => '3',
            'name' => 'Jorgito']);
         
    }
}
