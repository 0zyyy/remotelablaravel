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
        Schema::create('praktikums', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_prak');
            $table->string('slug');
            $table->string('dosen_prak');
            $table->boolean('status_code');
            $table->text('des_prak');
            $table->text('langkah_peng');
            $table->string('matkul');
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
        Schema::dropIfExists('praktikums');
    }
};
