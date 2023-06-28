<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('nisn', 10);
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');

            #$table->date('tgl_bayar');
            $table->string('bulan_dibayar', 8);
            #$table->string('tahun_dibayar', 4);

            $table->integer('id_spp')->unsigned();
            $table->foreign('id_spp')->references('id_spp')->on('spp')->cascadeOnDelete()->cascadeOnUpdate();

            $table->integer('jumlah_bayar');
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
        Schema::dropIfExists('pembayarans');
    }
};
