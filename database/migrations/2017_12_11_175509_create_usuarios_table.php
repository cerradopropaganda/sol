<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('cnpj')->nullable();
            $table->string('fantasia')->nullable();
            $table->dateTime('data_contrato_inicio')->nullable();
            $table->dateTime('data_contrato_final')->nullable();
            $table->string('nome_contato')->nullable();
            $table->string('email_contato')->unique();
            $table->integer('status')->nullable();
            $table->string('endereco')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('website')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('fone1')->nullable();
            $table->string('fone2')->nullable();
            $table->string('fone3')->nullable();
            $table->rememberToken();
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
