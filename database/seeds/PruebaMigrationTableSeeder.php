<?php

use Illuminate\Database\Seeder;

class PruebaMigrationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Borramos los datos de la tabla
        DB::table('pruebamigration')->delete();
        
        // Añadimos entradas a esta tabla
        DB::table('pruebamigration')->insert([
            'id' => '1' ]);
        DB::table('pruebamigration')->insert([
            'id' => '2' ]);
        DB::table('pruebamigration')->insert([
            'id' => '3' ]);
    }
}
