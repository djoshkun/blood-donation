<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientForm extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|min:3|max:25',
            'fathersname' => 'required|min:3|max:25',
            'surname' => 'required|min:3|max:25',
            'gender' => 'required|in:male,female',
            'blood_type' => 'required',
            'hospital_id' => 'required',
            'blood_quantity' => 'required|integer|min:1',
            'count_blood_quantity' => null !== request('count_blood_quantity') ? 'required|integer|min:1' : ''
        ];
    }

    public function messages() {
        return [
            'count_blood_quantity.min' => 'Въведете брой намерени донори.',
            'count_blood_quantity.integer' => 'Въведете брой намерени донори.',
            'count_blood_quantity.required' => 'Въведете брой намерени донори.',
            'blood_quantity.min' => 'Въведете брой донори.',
            'blood_quantity.integer' => 'Въведете брой донори.',
            'blood_quantity.required' => 'Въведете брой донори.',
            'name.required' => 'Въведете име.',
            'name.min' => 'Името трябва да съдържа минимум 3 символа.',
            'name.max' => 'Името може да съдържа максимум 25 символа.',
            'fathersname.required' => 'Въведете презиме.',
            'fathersname.min' => 'Презиме трябва да съдържа минимум 3 символа.',
            'fathersname.max' => 'Презиме може да съдържа максимум 25 символа.',
            'surname.required' => 'Въведете фамилия.',
            'surname.min' => 'Фамилията трябва да съдържа минимум 3 символа.',
            'surname.max' => 'фамилията може да съдържа максимум 25 символа.',
            'gender.required' => 'Изберете пол.',
            'gender.in' => 'Невалиден пол.',
            'hospital_id.required' => 'Изберете болница.',
            'blood_type.required' => 'Изберете кръвна  група.',
        ];
    }

}
