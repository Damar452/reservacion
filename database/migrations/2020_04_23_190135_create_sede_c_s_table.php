<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedeCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sede_c', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_dia');
            $table->Integer('id_horario');
            $table->Integer('A01');
            $table->Integer('A02');
            $table->Integer('A03');
            $table->Integer('A04');
            $table->Integer('A05');
            $table->Integer('A06');
            $table->Integer('B07');
            $table->Integer('B08');
            $table->Integer('B09');
            $table->Integer('B10');
            $table->Integer('B11');
            $table->Integer('B12');
            $table->Integer('C13');
            $table->Integer('C14');
            $table->Integer('C15');
            $table->Integer('C16');
            $table->Integer('17');
            $table->Integer('D18');
            $table->Integer('D19');
            $table->Integer('D20');
            $table->Integer('D21');
            $table->Integer('D22');
            $table->Integer('D23');
            $table->Integer('D24');
            $table->Integer('D25');
            $table->Integer('D26');
            $table->Integer('EP1');
            $table->Integer('EP2');
            $table->Integer('LAR');
            $table->Integer('RDI');
            $table->Integer('S04');
            $table->Integer('S05');
            $table->Integer('SJU');
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
        Schema::dropIfExists('sede_c');
    }
}
