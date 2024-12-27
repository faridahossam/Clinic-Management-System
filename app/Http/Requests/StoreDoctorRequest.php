<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    /*
    public function authorize()
    {
        return false;
    }*/

    public function rules()
    {
        return [
            'name' => [
                'required', 'string',
            ],
            'phone' => [
                'required', 'string',
            ],
            'photo' => [
                'required','file',
            ],
            'speciality' => [
                'required', 'string',
            ]
        ];
    }
}