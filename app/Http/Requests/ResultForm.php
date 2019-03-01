<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultForm extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        $rules = [];
        foreach ($this->request->get('hiv_spin') as $key => $value) {
            $rules['hiv_spin.' . $key] = 'required';
        }
        foreach ($this->request->get('hepatitis_b') as $key => $value) {
            $rules['hepatitis_b.' . $key] = 'required';
        }
        foreach ($this->request->get('hepatitis_c') as $key => $value) {
            $rules['hepatitis_c.' . $key] = 'required';
        }
        foreach ($this->request->get('syphilis') as $key => $value) {
            $rules['syphilis.' . $key] = 'required';
        }
        return $rules;
    }

}
