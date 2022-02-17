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
        Schema::create('antrians', function (Blueprint $table) {
            $table->id('id_antrian');
            $table->foreignId('id_praktikum')->constrained('praktikums','id');
            $table->foreignId('id_user')->constrained('users','id');
            $table->integer('nomor_antrian');
            $table->integer('status')->default(0);
            $table->timestamp('waktu_masuk');
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
        Schema::dropIfExists('antrians');
    }
};
