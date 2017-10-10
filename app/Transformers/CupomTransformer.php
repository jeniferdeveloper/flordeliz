<?php

namespace FlorDeLiz\Transformers;

use League\Fractal\TransformerAbstract;
use FlorDeLiz\Models\Cupom;

/**
 * Class CupomTransformer
 * @package namespace FlorDeLiz\Transformers;
 */
class CupomTransformer extends TransformerAbstract
{

    /**
     * Transform the \Cupom entity
     * @param \Cupom $model
     *
     * @return array
     */
    public function transform(Cupom $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
