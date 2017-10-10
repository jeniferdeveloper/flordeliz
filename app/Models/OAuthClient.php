<?php

namespace FlorDeLiz\Models;

use Illuminate\Database\Eloquent\Model;
use function is_array;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class OAuthClient extends Model implements Transformable
{
    use TransformableTrait;
//
//public function  client() {
//    return $this->hasOne(Client::class);
//}
//
//public function orders() {
//        return $this->hasMany(Pedido::class);
//    }
//
//
//public function roles()
//    {
//        return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');
//    }


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'secret', 'name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['password', 'remember_token'];

//    public function hasManyRoles($roles)
//    {
//        if(is_array($roles)){
//            foreach ($roles  as $role){
//                if($this->hasRole($role))
//                    return true;
//            }
//        }else{
//            if($this->hasRole($roles))
//                return true;
//        }
//        return false;
//    }
//
//    public function hasRole($role)
//    {
//        if($this->roles()->where('name',$role)->first()){
//            return true;
//        }
//
//        return false;
//    }
}
