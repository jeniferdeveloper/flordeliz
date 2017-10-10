<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupoms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('description');
            $table->date('validate');
            $table->string('code');
            $table->decimal('value', 5, 2);
            $table->boolean('used');
            $table->timestamps();
        });
    }

    /**
     * Reverse the <migrations class=""></migrations>
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cupoms');
    }
}
