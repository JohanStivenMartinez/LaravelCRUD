<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();//Se tomará id como Usuario siendo un index único auto increment

            $table->String('User') -> unique();
            $table->String('Nombre');
            $table->String('Telefono',11);
            $table->String('Direccion');
            $table->String('Email') -> unique();
            $table->String('Contraseña',6);


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
        Schema::dropIfExists('usuarios');
    }
}
