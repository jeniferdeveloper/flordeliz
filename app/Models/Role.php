<?php

namespace FlorDeLiz\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class Role extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'name',
		'description',
	];

	public function users()
    {
        return $this->belongsToMany(User::class,'user_roles','role_id','user_id');
    }

}
