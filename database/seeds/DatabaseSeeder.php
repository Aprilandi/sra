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
       $this->call(RolesSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(KepolisianSeeder::class);
       $this->call(RumahSakitSeeder::class);
       $this->call(JenisKecelakaanSeeder::class);
       $this->call(StatusSeeder::class);
    }
}
