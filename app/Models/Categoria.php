<?php

namespace FlorDeLiz\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable=[
     'name'

    ];

    public function products() {
      return  $this->hasMany(Produto::class);
    }

}
