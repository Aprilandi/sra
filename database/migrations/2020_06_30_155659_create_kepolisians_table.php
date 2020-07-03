<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepolisiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepolisian', function (Blueprint $table) {
            $table->increments('id_pl');
            $table->integer('id_user')->unsigned();
            $table->String('nama_pl', 50);
            $table->String('alamat', 100);
            $table->float('lat', 10, 6);
            $table->float('lng', 10, 6);
            $table->String('no_telp', 13);
            $table->timestamps();

            $table->foreign('id_user')
            ->references('id_user')->on('users')
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
        Schema::dropIfExists('kepolisian');
    }
}
