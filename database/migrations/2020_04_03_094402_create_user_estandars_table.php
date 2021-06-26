<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEstandarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_estandars', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('correo');
            $table->string('facultad');
            $table->string('tipo');
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
        Schema::dropIfExists('user_estandars');
    }
}
