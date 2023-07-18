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
            $table->BigInteger('nik');
            $table->BigInteger('nomor_kk');
            $table->string('alamat');
            $table->string('bidang_usaha');
            $table->string('jenis_usaha');
            $table->BigInteger('telepon');
            $table->BigInteger('sku');
            $table->BigInteger('omset');
            $table->BigInteger('aset');
            $table->enum('pemasaran', ['Online', 'Offline']);
            $table->integer('tk');
            $table->enum('validasi', ['Valid', 'Belum']);
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
