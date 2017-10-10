<?php

namespace FlorDeLiz\Transformers;

use League\Fractal\TransformerAbstract;
use FlorDeLiz\Models\Pedido;

/**
 * Class OrderTransformer
 * @package namespace FlorDeLiz\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{
//    protected $defaultIncludes = ['cupom','items'];
    protected $availableIncludes = ['cupom','items','client'];
    /**
     * Transform the \Pedido entity
     * @param \Pedido $model
     *
     * @return array
     */
    public function transform(Pedido $model)
    {
        return [
            'id'         => (int) $model->id,
            'total'      => (float) $model->total,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
    public function includeClient(Pedido $model)
    {

        return $this->item($model->client, new ClientTransformer());
    }

    public function includeCupom(Pedido $model)
    {
        if(!$model->cupom)
            return null;
        return $this->item($model->cupom, new CupomTransformer());
    }

    public function includeItems(Pedido $model)
    {
        return $this->collection($model->items, new OrderItemTransformer());
    }
}
