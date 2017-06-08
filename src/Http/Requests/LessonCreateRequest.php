<?php

namespace Scool\Timetables\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //recordar que s'ha de canviar cada cop
//        if(Auth::user()->can('add attendances')) return true;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //          'notes' => 'required',
//            'user_id' => 'required',
            //TODO
        ];
    }
}
