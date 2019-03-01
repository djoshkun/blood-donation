<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller {

    private $rules = [
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:3', 'max:6', 'confirmed'],
        'password_confirmation' => ['required_with:password', 'string', 'min:3', 'max:6']
    ];
    private $messages = [
        'email' => 'Невалиден email.',
        'email.required' => 'Въведете еmail.',
        'password.required' => 'Въведете парола.',
        'password.min' => 'Паролата трябва да съдържа минимум 3 символа.',
        'password.max' => 'Паролата не може съдържа повече от 6 символа.',
        'password.confirmed' => 'Паролите са различни.',
        'email.unique' => 'Грешен email.'
    ];

    protected function register() {
        $validator = Validator::make(request()->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return response()->json([
                        'fail' => true,
                        'errors' => $validator->errors()
            ]);
        }
        $user = new User();
        $user->email = request('email');
        $user->password = request('password');
        $user->role = User::ROLE_USER;
        $user->active = 1;
        $user->save();
        auth()->login($user);
        return response()->json([
                    'fail' => false,
                    'route' => route('profile')
        ]);
    }

    protected function login() {
        if (!request('password') && !request('email')) {
            return response()->json([
                        'error' => '',
                        'fail' => true
            ]);
        }
        if (!auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            return response()->json([
                        'error' => 'Грешен email/парола.',
                        'fail' => true
            ]);
        }
        if (!auth()->attempt(['email' => request('email'), 'password' => request('password'), 'active' => 1])) {
            return response()->json([
                        'error' => 'Достъпът Ви е спрян временно.',
                        'fail' => true
            ]);
        }
        return response()->json([
                    'fail' => false,
                    'route' => route('profile')
        ]);
    }

    protected function logout() {
        auth()->logout();
        return redirect()->route('index');
    }

}
