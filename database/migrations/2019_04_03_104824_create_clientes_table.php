<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('tipocliente')->unsigned();
            $table->string('apellidoynombre')->nullable();;            
            $table->string('email');
            $table->string('direccion')->nullable();;
            $table->string('localidad')->nullable();;
            $table->string('codigopostal')->nullable();;
            $table->string('telefono')->nullable();;
            $table->string('razonsocial')->nullable();;
            $table->string('cuit')->nullable();;
            $table->string('condicioniva')->nullable();;
            $table->string('observaciones')->nullable();;
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
