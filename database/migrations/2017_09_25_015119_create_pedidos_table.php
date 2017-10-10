<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('user_deliveryman_id')->unsigned()->nullable();
            $table->foreign('user_deliveryman_id')->references('id')->on('users');
            $table->decimal('total', 6,2);
            $table->decimal('desconto', 6,2)->nullable();
//            $table->smallInteger('status')->default(0);
            $table->enum('status', array('0'=>'Pendente','1'=>'Pedido efetuado', '2'=>'Pagamento Autorizado',
                '3'=>'Nota fiscal emitida', '4'=>'Produto entregue à transportadora', '5'=>'Em trânsito', '6'=>'Produto entregue',
                '7'=>'Cancelado', '8'=>'Pagamento não aprovado'))->default('Pendente');

            $table->integer('cupom_id')->unsigned()->nullable();
            $table->foreign('cupom_id')->references('id')->on('cupoms');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedidos');
    }
}
