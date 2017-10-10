<?php

namespace FlorDeLiz\Transformers;

use League\Fractal\TransformerAbstract;
use FlorDeLiz\Models\PedidoItem;

/**
 * Class OrderItemTransformer
 * @package namespace FlorDeLiz\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{

    /**
     * Transform the \PedidoItem entity
     * @param \PedidoItem $model
     *
     * @return array
     */
    public function transform(PedidoItem $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
