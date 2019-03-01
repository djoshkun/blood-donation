<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;

class UserForm extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => [
        'required', 'string', 'email', 'max:255',
        'email' => isset($this->route('user')->id) ? Rule::unique('users')->ignore($this->route('user')->id) : Rule::unique('users'),
            ],
            'password' => isset($this->route('user')->id) && request('password') === null ? '' : 'required|min:3|max:6',
            'role' => 'required|in:ROLE_USER,ROLE_ADMIN,ROLE_DOCTOR,ROLE_LABORANT',
            'active' => 'required',
            'hospital_id' => request('role') === User::ROLE_ADMIN || request('role') === User::ROLE_USER ? '' : 'required'
        ];
    }

    public function messages() {
        return [
            'password.required' => 'Въведете парола.',
            'password.min' => 'Паролата трябва да съдържа минимум 3 символа.',
            'password.max' => 'Паролата не може съдържа повече от 6 символа.',
            'role.required' => 'Изберете тип.',
            'role.in' => 'Невалиден тип.',
            'email.required' => 'Въведете еmail.',
            'email' => 'Невалиден email.',
            'email.unique' => 'Грешен email.',
            'hospital_id.required' => 'Изберете болница.',
            'active.required' => 'Маркирайте активност.'
        ];
    }

}
