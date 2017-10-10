<?php

namespace FlorDeLiz\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FlorDeLiz\Repositories\ProductRepository;
use FlorDeLiz\Models\Produto;
use FlorDeLiz\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent
 * @package namespace FlorDeLiz\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    public function lists() {
        return $this->model->orderBy('preco','asc')->get(['id','nome','preco']);
    }

    public function listsProduct() {
        return $this->model->lists('nome','id');
    }



    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Produto::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
