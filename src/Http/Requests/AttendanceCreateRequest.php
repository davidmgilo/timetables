<?php

namespace Scool\Timetables\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //recordar que s'ha de canviar cada cop
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
            'notes' => 'required',
            'user_id' => 'required',
            //TODO
        ];
    }
}
