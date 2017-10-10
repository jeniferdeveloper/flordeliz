<?php

namespace FlorDeLiz\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FlorDeLiz\Repositories\CategoryRepository;

use Illuminate\Database\Eloquent\Model;
use FlorDeLiz\Validators\CategoryValidator;
use \FlorDeLiz\Models\Categoria;
/**
 * Class CategoryRepositoryEloquent
 * @package namespace FlorDeLiz\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
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
        return Categoria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
