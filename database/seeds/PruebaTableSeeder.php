<?php

use Illuminate\Database\Seeder;

class PruebaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla
        DB::table('prueba')->delete();
        
        // Añadimos una entrada a esta tabla
        DB::table('prueba')->insert([
            'id' => '1' ]);
    }
}
