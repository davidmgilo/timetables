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
//            'user_id'           => (int) $model->user_id,
//            'day_id'            => (int) $model->day_id,
//            'timeslot_id'       => (int) $model->timeslot_id ,
//            'date'              => $model->date,
//            'studysubmodule_id' => (int) $model->studysubmodule_id ,
//            'type_id'           => (int) $model->type_id,
//            'notes'             => $model->notes,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
