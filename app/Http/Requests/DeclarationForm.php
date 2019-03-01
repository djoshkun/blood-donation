<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeclarationForm extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'blood_type' => 'required',
            'description' => 'required'
        ];
    }

    public function messages() {
        return [
            'blood_type.required' => 'Изберете кръвна група.',
            'description.required' => 'Напишете вашите наблюдения.'
        ];
    }

}
