<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Declaration;

class AnswerForm extends FormRequest {

    private $declaration;

    public function authorize() {
        return true;
    }

    public function __construct() {
        $this->declaration = Declaration::ActiveDeclaration();
    }

    public function rules() {
        $rules = [];
        foreach ($this->declaration->questions as $key => $val) {
            $rules['answer.' . $val->id] = 'required|in:yes,no';
        }
        return $rules;
    }

    public function messages() {
        $messages = [];
        foreach ($this->declaration->questions as $key => $val) {
            $messages['answer.' . $val->id . '.required'] = 'Моля отговорете на въпроса.';
            $messages['answer.' . $val->id . '.in'] = 'Невалиден отговор.';
        }
        return $messages;
    }

}
