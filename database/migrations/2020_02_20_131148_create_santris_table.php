<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->increments('id_santri');
            $table->integer('id_jabatan')->unsigned();
            $table->integer('id_golongansantri');
            $table->integer('id_kelas');
            $table->integer('id_user');
            $table->char('no_ktp',16);
            $table->string('nama_lengkap',50);
            $table->string('nama_panggilan',10);
            $table->string('nama_kunyah',45);
            $table->string('tempat_lahir',45);
            $table->date('tanggal_lahir');
            $table->string('kota_asal',45);
            $table->string('alamat_asal',100);
            $table->string('no_hp',15);
            $table->string('email',45);
            $table->string('password',60);
            $table->string('nama_kampus',60);
            $table->string('jurusan',45);
            $table->string('strata',15);
            $table->integer('tahun_angkatan');
            $table->integer('tahun_masuk');
            $table->integer('tahun_keluar');
            $table->string('foto_profil',200);
            $table->timestamps();
            $table->softDeletes();

            //foreign key
            $table->foreign('id_jabatan')
            ->references('id_jabatan')->on('jabatan')
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
        Schema::dropIfExists('santris');
    }
}
