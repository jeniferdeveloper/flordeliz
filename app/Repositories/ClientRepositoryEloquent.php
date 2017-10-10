<?php

namespace FlorDeLiz\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FlorDeLiz\Repositories\ClientRepository;
use FlorDeLiz\Models\Cliente;
use FlorDeLiz\Validators\ClientValidator;

/**
 * Class ClientRepositoryEloquent
 * @package namespace FlorDeLiz\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
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
        return Cliente::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
