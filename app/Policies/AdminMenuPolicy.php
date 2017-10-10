<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 19/07/2017
 * Time: 21:33
 */

namespace FlorDeLiz\Policies;


use FlorDeLiz\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminMenuPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }


    public function areaAdmin(User $user)
    {
        return $user->hasManyRoles(['admin']);
    }

    public function areaClient(User $user)
    {
        return $user->hasRole('client');
    }
}