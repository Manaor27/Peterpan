<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocPendukungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_pendukung', function (Blueprint $table) {
            $table->id();
            $table->string('ktm')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('transkrip')->nullable();
            $table->string('khs')->nullable();
            $table->string('akte')->nullable();
            $table->string('kk')->nullable();
            $table->string('surat')->nullable();
            $table->unsignedbigInteger('id_perubahan');
            $table->foreign('id_perubahan')->references('id')->on('perubahan')->onDelete('CASCADE');
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
        Schema::dropIfExists('doc_pendukung');
    }
}
