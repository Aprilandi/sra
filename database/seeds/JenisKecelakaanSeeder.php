<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKecelakaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_kecelakaan')->insert([
            'jenis_kecelakaan' => 'Ringan',
            'keterangan' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('jenis_kecelakaan')->insert([
            'jenis_kecelakaan' => 'Berat',
            'keterangan' => 'Membikin macet, menelan korban jiwa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
