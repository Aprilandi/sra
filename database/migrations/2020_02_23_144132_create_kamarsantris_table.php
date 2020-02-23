<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarsantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamarsantris', function (Blueprint $table) {
            $table->increments('id_kamarsantri');
            $table->integer('id_santri')->unsigned();
            $table->integer('id_kamar')->unsigned();
            $table->tinyInteger('is_ketua_kamar');
            $table->date('tgl_masukkamar');
            $table->date('tgl_keluarkamar');
            $table->timestamps();
            $table->softDeletes();

            //foreign key
            $table->foreign('id_santri')
            ->references('id_santri')->on('santris')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_kamar')
            ->references('id_kamar')->on('kamars')
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
        Schema::dropIfExists('kamarsantris');
    }
}
