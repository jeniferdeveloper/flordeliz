<?php

namespace FlorDeLiz\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Produto extends Model implements Transformable
{
    use TransformableTrait;

       protected $fillable=[
       'categoria_id',
        'nome',
        'descricao',
        'tamanho',
        'cor',
        'preco',
        'barcode',
        'img_src',
        'qtd',
        'ativo'

    ];

    public function category() {
    return $this->belongsTo(Categoria::class);
}

    public function productions() {
        return  $this->hasMany(Producao::class);
    }
}
