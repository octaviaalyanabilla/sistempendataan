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
            $table->id();
            $table->unsignedBigInteger('judul_surat_id');
            $table->string('perihal')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->string('file_surat')->nullable();
            $table->enum('jenis_surat', ['penting'], ['biasa'])->nullable();
            $table->foreign('judul_surat_id')->references('id')->on('surat_survei')->onDelete('cascade');
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
