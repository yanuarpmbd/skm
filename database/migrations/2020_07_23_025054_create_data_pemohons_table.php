<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPemohonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pemohons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_tiket');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('bidang_izin');
            $table->string('nama_izin');
            $table->string('lok_usaha');
            $table->string('status');
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
        Schema::dropIfExists('data_pemohons');
    }
}
