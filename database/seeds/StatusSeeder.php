<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'nama_sts' => 'Belum',
            'keterangan' => 'Laporan Baru, masih belum ditangani',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('status')->insert([
            'nama_sts' => 'Masih',
            'keterangan' => 'Sudah ditangani atau sudah dikirimkan unit dari pihak yang terkait untuk membantu',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('status')->insert([
            'nama_sts' => 'Sudah',
            'keterangan' => 'Masalah sudah terselesaikan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
