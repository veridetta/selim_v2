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
        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('bagian');
            $table->string('jabatan');
            $table->string('pokok');
            $table->string('ttetap');
            $table->string('tjabatan');
            $table->string('tinsentif');
            $table->string('ttransport');
            $table->string('lembur');
            $table->string('masa');
            $table->string('kode');
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
        Schema::dropIfExists('jabatans');
    }
};
