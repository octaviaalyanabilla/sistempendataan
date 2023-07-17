<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratSurveiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_survei', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_surat');
            $table->string('pengirim');
            $table->string('perihal')->nullable();
            $table->date('tgl_surat_asal')->nullable();
            $table->date('tgl_surat')->nullable();
            $table->string('file_surat')->nullable();
            $table->enum('jenis_surat', ['penting', 'biasa'])->nullable();
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
        Schema::dropIfExists('surat_survei');
    }
}
