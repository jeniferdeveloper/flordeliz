<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->string('tamanho')->nullable();
            $table->string('cor')->nullable();
            $table->decimal('preco')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('qtd')->nullable();
           $table->string('img_src')->nullable();
            $table->boolean('ativo');
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
        Schema::drop('produtos');
    }
}
