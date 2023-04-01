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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->integer('id_karyawan');
            $table->string('nama');
            $table->string('tpl');
            $table->string('tgl');
            $table->string('jk');
            $table->string('mulai');
            $table->string('email');
            $table->string('kota');
            $table->string('jabatan');
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
        Schema::dropIfExists('lamarans');
    }
};
