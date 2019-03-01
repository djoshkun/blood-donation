<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionTwoForm extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        $rules = [];
        if ($this->request->get('flag') === 'yes') {
            $rules['search'] = 'in:';
        }
        if ($this->request->get('flag') === 'no') {
            $rules['search'] = 'required';
        }
        if ($this->request->get('search') === null) {
            $rules['flag'] = 'required|in:yes';
        }
        if ($this->request->get('search') !== null) {
            $rules['flag'] = 'required|in:no';
        }
        return $rules;
    }

    public function messages() {
        $messages = [];
        if ($this->request->get('flag') === 'yes') {
            $messages['search.in'] = 'Изчистете полето за пациент и натиснете дарете кръв.';
        }
        if ($this->request->get('flag') === 'no') {
            $messages['search.required'] = 'Изберете донор.';
        }
        if ($this->request->get('search') === null) {
            $messages['flag.in'] = '';
            $messages['flag.required'] = 'Изберете да или не.';
        }
        if ($this->request->get('search') !== null) {
            $messages['flag.in'] = '';
            $messages['flag.required'] = 'Изберете не.';
        }
        return $messages;
    }

}
