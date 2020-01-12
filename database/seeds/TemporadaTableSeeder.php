<?php

use Illuminate\Database\Seeder;

class TemporadaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla
        DB::table('Temporada')->delete();
        
        // Añadimos una entrada a esta tabla
        DB::table('Temporada')->insert([
            'id' => '1' ,
            'temporada' => 'Alta' ,
            'fecha_inicio' => '2007-05-03' ,
            'fecha_fin' => '2007-06-15' ,
            'porcentaje' => '5']);
    }
}
