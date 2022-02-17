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
        Schema::create('hasil_praks', function (Blueprint $table) {
            $table->id();
            $table->integer('detik');
            $table->integer('Frekuensi');
            $table->float('Arus_Motor');
            $table->float('Tegangan_Motor');
            $table->float('Kecepatan_Rotor');
            $table->float('Kecepatan_Stator');
            $table->float('V_generator');
            $table->float('I_generator');
            $table->integer('jml_lampi');
            $table->foreignId('user_id')->constrained('users','id');
            $table->date('Tanggal');
            $table->foreignId('id_prak')->constrained('praktikums','id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_praks');
    }
};
