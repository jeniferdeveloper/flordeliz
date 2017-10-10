<?php

namespace FlorDeLiz\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Producao extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'producoes';

    protected $fillable = [
        'produto_id',
        'tamanho',
        'qtd',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }

}
