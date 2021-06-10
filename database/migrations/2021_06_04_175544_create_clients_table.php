<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->unsignedBigInteger('form_id');
            // $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');

            $table->string('nome_empresa', 100);
            $table->string('cnpj', 14);
            $table->string('nome_responsavel', 100);
            $table->string('email', 100);
            $table->string('celular', 11);
            //Adicionar imagem posteriormente
            // $table->string('imagem', 11);
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
        Schema::dropIfExists('clients');
    }
}
