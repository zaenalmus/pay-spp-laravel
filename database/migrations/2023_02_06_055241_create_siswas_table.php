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
        Schema::create('siswa', function (Blueprint $table) {
            $table->char('nisn', 10)->primary();
            $table->char('nis', 8);
            $table->string('nama', 35);

            $table->integer('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');

            $table->text('alamat');
            $table->string('no_telp', 13);

            $table->integer('id_spp')->unsigned();
            $table->foreign('id_spp')->references('id_spp')->on('spp')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('siswas');
    }
};
