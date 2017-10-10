<?php

namespace FlorDeLiz\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cliente extends Model implements Transformable
{
    use TransformableTrait;

   //
    protected $fillable=[
       'user_id',      
       'cpf',
       'cnpj',
       'telefone',
       'ativo'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
