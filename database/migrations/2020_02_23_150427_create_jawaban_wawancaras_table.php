<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanWawancarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_wawancaras', function (Blueprint $table) {
            $table->increments('id_jawabanwawancara');
            $table->integer('id_wawancara')->unsigned();
            $table->integer('id_santri')->unsigned();
            $table->text('jawaban_wawancara');
            $table->timestamps();
            $table->softDeletes();

            //foreign key
            $table->foreign('id_wawancara')
            ->references('id_wawancara')->on('wawancaras')
            ->onUpdate('cascade')
            ->onDelete('restrict');

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
        Schema::dropIfExists('jawaban_wawancaras');
    }
}
