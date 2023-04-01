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
        Schema::create('absenses', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->string('id_karyawan');
            $table->string('jabatan');
            $table->string('nama');
            $table->string('tanggal');
            $table->string('in');
            $table->string('out');
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
        Schema::dropIfExists('absenses');
    }
};
