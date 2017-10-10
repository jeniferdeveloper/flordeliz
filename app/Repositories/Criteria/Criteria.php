<?php 
namespace FlorDeLiz\Repositories\Criteria;

use FlorDeLiz\Repositories\Contracts\RepositoryInterface as Repository;
use FlorDeLiz\Repositories\Contracts\RepositoryInterface;

abstract class Criteria {

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public abstract function apply($model, Repository $repository);
}