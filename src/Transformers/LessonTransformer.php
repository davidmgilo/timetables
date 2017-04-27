<?php

namespace Scool\Timetables\Transformers;

use League\Fractal\TransformerAbstract;
use Scool\Timetables\Models\Lesson;

/**
 * Class LessonTransformer
 * @package namespace Scool\Timetables\Transformers;
 */
class LessonTransformer extends TransformerAbstract
{

    /**
     * Transform the \Lesson entity
     * @param \Lesson $model
     *
     * @return array
     */
    public function transform(Lesson $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
