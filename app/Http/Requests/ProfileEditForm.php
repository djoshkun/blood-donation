<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileEditForm extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => [
                'required', 'string', 'email', 'max:255',
                'email' => Rule::unique('users')->ignore(auth()->id())
            ],
            'name' => 'required|min:3|max:25',
            'fathersname' => 'required|min:3|max:25',
            'surname' => 'required|min:3|max:25',
            'egn' => 'required|digits_between:10,10',
            'password' => request('password') !== null ?  'required|min:3|max:6' : '',
            'gender' => 'required|in:male,female',
            'city_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Въведете име.',
            'name.min' => 'Името трябва да съдържа минимум 3 символа.',
            'name.max' => 'Името може да съдържа максимум 25 символа.',
            'fathersname.required' => 'Въведете презиме.',
            'fathersname.min' => 'Презиме трябва да съдържа минимум 3 символа.',
            'fathersname.max' => 'Презиме може да съдържа максимум 25 символа.',
            'surname.required' => 'Въведете фамилия.',
            'surname.min' => 'Фамилията трябва да съдържа минимум 3 символа.',
            'surname.max' => 'фамилията може да съдържа максимум 25 символа.',
            'egn.required' => 'Въведете ЕГН.',
            'egn.digits_between' => 'ЕГН трябва да съдържа 10 цифри.',
            'password.required' => 'Въведете парола.',
            'password.min' => 'Паролата трябва да съдържа минимум 3 символа.',
            'password.max' => 'Паролата не може съдържа повече от 6 символа.',
            'gender.required' => 'Изберете пол.',
            'gender.in' => 'Невалиден пол.',
            'city_id.required' => 'Изберете град.',
            'email.required' => 'Въведете еmail.',
            'email' => 'Невалиден email.',
            'email.unique' => 'Грешен email.'
        ];
    }

}
