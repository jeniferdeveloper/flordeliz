<?php

namespace FlorDeLiz\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PedidoItems extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'pedidos_items';
    protected $fillable = [
		'produto_id',
		'pedido_id',
		'tamanho',
		'preco',
		'qtd',
		'valorTotal',
	];
    public function order()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function product()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
}
