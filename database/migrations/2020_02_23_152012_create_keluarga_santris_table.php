<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargaSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga_santris', function (Blueprint $table) {
            $table->increments('id_keluargasantri');
            $table->integer('id_santri')->unsigned();
            $table->string('nama_ayah',60);
            $table->string('alamat_ayah',100);
            $table->string('pekerjaan_ayah',50);
            $table->timestamps();
            $table->softDeletes();

            //foreign key
            $table->foreign('id_santri')
            ->references('id_santri')->on('santris')
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
        Schema::dropIfExists('keluarga_santris');
    }
}
