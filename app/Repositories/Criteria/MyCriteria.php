<?php 
namespace FlorDeLiz\Repositories\Criteria;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

class MyCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
         $model = $model->with(['roles' => function($q){
        $q->where('role_id', 2);
    }])->whereHas('roles', function($query) {
        $query->where('role_id', 2);
    });

    return $model;
    }
}