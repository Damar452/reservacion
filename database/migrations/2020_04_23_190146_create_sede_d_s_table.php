<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedeDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sede_d', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_dia');
            $table->Integer('id_horario');
            $table->Integer('1');
            $table->Integer('2');
            $table->Integer('3');
            $table->Integer('4');
            $table->Integer('5');
            $table->Integer('6');
            $table->Integer('7');
            $table->Integer('8');
            $table->Integer('9');
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
        Schema::dropIfExists('sede_d');
    }
}
