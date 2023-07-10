<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_um', function (Blueprint $table) {
            $table->id();
            $table->string('nama_data', 100)->nullable();
            $table->integer('nik');
            $table->integer('nomor_kk');
            $table->string('alamat')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->integer('telepon');
            $table->integer('sku');
            $table->integer('omset');
            $table->integer('aset');
            $table->enum('pemasaran', ['Online', 'Offline']);
            $table->integer('tk');
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
        Schema::dropIfExists('data_um');
    }
}
