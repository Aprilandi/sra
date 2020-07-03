<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('id_lapor');
            $table->integer('id_jenis')->unsigned();
            $table->String('pelapor', 13);
            $table->String('loc_gps', 200);
            $table->String('keterangan', 100);
            $table->dateTime('tanggal_laporan');
            $table->timestamps();

            $table->foreign('id_jenis')
            ->references('id_jenis')->on('jenis_kecelakaan')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
