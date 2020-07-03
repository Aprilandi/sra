<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenanganansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penanganan', function (Blueprint $table) {
            $table->increments('id_penanganan');
            $table->integer('id_lapor')->unsigned();
            $table->integer('id_sts')->unsigned();
            $table->integer('id_rs')->nullable()->unsigned();
            $table->integer('id_pl')->nullable()->unsigned();
            $table->dateTime('waktu_estimasi');
            $table->String('keterangan', 150);
            $table->timestamps();

            $table->foreign('id_lapor')
            ->references('id_lapor')->on('laporan')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_sts')
            ->references('id_sts')->on('status')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_rs')
            ->references('id_rs')->on('rumah_sakit')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_pl')
            ->references('id_pl')->on('kepolisian')
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
        Schema::dropIfExists('detail_penanganans');
    }
}
