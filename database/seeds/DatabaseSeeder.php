<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PruebaMigrationTableSeeder::class);
        $this->call(TemporadaTableSeeder::class);
        $this->call(PruebaConVistaTableSeeder::class);
    }
}
