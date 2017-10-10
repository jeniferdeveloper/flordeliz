<?php

namespace FlorDeLiz\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FlorDeLiz\Repositories\ProducaoRepository;
use FlorDeLiz\Models\Producao;

/**
 * Class ProducaoRepositoryEloquent
 * @package namespace FlorDeLiz\Repositories;
 */
class ProducaoRepositoryEloquent extends BaseRepository implements ProducaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Producao::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
