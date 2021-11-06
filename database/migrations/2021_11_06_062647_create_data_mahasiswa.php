<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->string('nama_ibu');
            $table->string('perguruan_tinggi');
            $table->string('prodi');
            $table->string('status');
            $table->date('tgl_masuk');
            $table->string('periode_daftar');
            $table->date('tgl_lulus')->nullable();
            $table->float('ipk')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('tempat_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('kota');
            $table->integer('kode_pos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_mahasiswa');
    }
}
