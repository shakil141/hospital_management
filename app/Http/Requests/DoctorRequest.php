<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'doctor_name' => 'required',
            'phone' => 'required',
            'speciality' => 'required',
            'room_no' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048',

        ];
    }
}
