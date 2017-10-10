<?php

namespace FlorDeLiz\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FlorDeLiz\Models\PedidoItems;

/**
 * Class PedidoItemsRepositoryEloquent
 * @package namespace FlorDeLiz\Repositories;
 */
class PedidoItemsRepositoryEloquent extends BaseRepository implements PedidoItemsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PedidoItems::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
