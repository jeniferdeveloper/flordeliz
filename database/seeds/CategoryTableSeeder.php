<?php

use Illuminate\Database\Seeder;
use FlorDeLiz\Models\Categoria;
use FlorDeLiz\Models\Produto;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Categoria::class, 10)->create()->each(function ($c) {
             for ($i = 0; $i <= 5; $i++) {
                 $c->products()->save(factory(Produto::class)->make());
             } 
        });

        
    }
}
