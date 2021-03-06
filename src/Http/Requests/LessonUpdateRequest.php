<?php

namespace Scool\Timetables\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class LessonUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->can('edit lessons')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'nullable|integer',
            'location_id' => 'nullable|integer',
            'day_id' => 'nullable|integer',
            'timeslot_id' => 'nullable|integer',
            'classroom_id' => 'nullable|integer',
        ];
    }
}
