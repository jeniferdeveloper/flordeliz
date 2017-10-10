<?php

namespace FlorDeLiz\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FlorDeLiz\Repositories\UserRepository;
use FlorDeLiz\Models\User;
use FlorDeLiz\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace FlorDeLiz\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
     public function lists() {
    return $this->model->lists('name','id');
}
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
