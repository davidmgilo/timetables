<?php

namespace Scool\Timetables\Transformers;

use League\Fractal\TransformerAbstract;
use Scool\Timetables\Models\Desiratum;

/**
 * Class DesiratumTransformer
 * @package namespace Scool\Timetables\Transformers;
 */
class DesiratumTransformer extends TransformerAbstract
{

    /**
     * Transform the \Desiratum entity
     * @param \Desiratum $model
     *
     * @return array
     */
    public function transform(Desiratum $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
