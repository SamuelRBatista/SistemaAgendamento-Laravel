<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');    
            $table->string('email');
            $table->string('telefone');
            $table->string('cpf');   
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');        
            $table->integer('id_cidade')->unsigned();
            $table->foreign('id_cidade')->references('id')->on('cidades');
            $table->integer('id_tipodado')->unsigned();
            $table->foreign('id_tipodado')->references('id')->on('tipodados');
            $table->integer('id_horario')->unsigned();
            $table->foreign('id_horario')->references('id')->on('horarios');
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
        Schema::dropIfExists('clientes');
    }
}
