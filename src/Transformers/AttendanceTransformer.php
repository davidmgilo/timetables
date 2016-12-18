<?php

namespace Scool\Timetables\Transformers;

use League\Fractal\TransformerAbstract;
use Scool\Timetables\Models\Attendance;

/**
 * Class AttendanceTransformer
 * @package namespace App\Transformers;
 */
class AttendanceTransformer extends TransformerAbstract
{

    /**
     * Transform the \Attendance entity
     * @param Attendance $model
     *
     * @return array
     */
    public function transform(Attendance $model)
    {
        return [
            'id'                => (int) $model->id,
            'user_id'           => (int) $model->user_id,
            'day_id'            => (int) $model->day_id,
            'timeslot_id'       => (int) $model->timeslot_id ,
            'date'              => $model->date,
            'studysubmodule_id' => (int) $model->studysubmodule_id ,
            'type_id'           => (int) $model->type_id,
            'notes'             => $model->notes,
            /* place your other model properties here */

            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at
        ];
    }
}
