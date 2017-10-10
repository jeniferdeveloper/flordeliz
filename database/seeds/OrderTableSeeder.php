<?php

use FlorDeLiz\Models\Pedido;
use FlorDeLiz\Models\PedidoItem;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Pedido::class, 10)->create()->each(function ($o) {
            for ($i = 0; $i <= 2; $i++) {
                $o->items()->save(factory(PedidoItem::class)->make([
                    'product_id' => rand(1, 5),
                    'qtd' => 2,
                    'price' => 50
                ]));
            }
        });
    }
}
