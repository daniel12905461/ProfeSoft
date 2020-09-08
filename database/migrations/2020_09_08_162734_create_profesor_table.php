<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesor', function (Blueprint $table) {
            $table->id('IdProfesor');
            $table->string('PrimerNombre', 45);
            $table->string('SegundoNombre', 45);
            $table->string('ApellidoPaterno', 45);
            $table->string('ApellidoMaterno', 45);
            $table->string('Usuario', 45);
            $table->string('Contrasenia', 45);
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
        Schema::dropIfExists('profesor');
    }
}
