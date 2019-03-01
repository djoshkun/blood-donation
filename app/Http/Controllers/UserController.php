<?php

namespace App\Http\Controllers;

use App\User;
use App\City;
use App\Http\Requests\ProfileEditForm;
use App\Hospital;
use App\Http\Requests\UserForm;

class UserController extends Controller {

    protected function index() {
        $users = null !== request('role') ? User::selectUserRole(request()->all())->get() : User::all();
        $user = new User();
        $role = request()->input('role');
        return view('users/index', compact('users', 'user', 'role'));
    }

    protected function create() {
        $hospitals = Hospital::pluck('name', 'id');
        return view('users/create', compact('hospitals'));
    }

    protected function edit(User $user) {
        $hospitals = Hospital::pluck('name', 'id');
        return view('users/edit', compact('user', 'cities', 'hospitals'));
    }

    protected function update(User $user, UserForm $form) {
        if (request('password') !== null) {
            $user->update(request(['role', 'password', 'email', 'active', 'hospital_id']));
            return redirect()->route('users.index')->with('success', 'Успешно редактиран потребител');
        } else {
            $user->update(request(['role', 'email', 'active', 'hospital_id']));
            return redirect()->route('users.index')->with('success', 'Успешно редактиран потребител');
        }
    }

    protected function store(UserForm $form) {
        User::create(request(['role', 'password', 'email', 'active', 'hospital_id']));
        return redirect()->route('users.index')->with('success', 'Успешно добавен потребител');
    }

    protected function updateProfile(User $user, ProfileEditForm $form) {
        if (request('password') !== null) {
            $user->update(request(['name', 'fathersname', 'surname', 'egn', 'password', 'email', 'city_id', 'gender']));
            return back()->with('success', 'Успешно редактирахте данните си');
        } else {
            $user->update(request(['name', 'fathersname', 'surname', 'egn', 'email', 'city_id', 'gender']));
            return back()->with('success', 'Успешно редактирахте данните си');
        }
    }

    protected function profile() {
        $user = User::find(auth()->id());
        $cities = City::pluck('name', 'id');
        return view('users/profile', compact('user', 'cities'));
    }

    protected function destroy(User $user) {
        $user->delete();
        return redirect()->back()->with('success', 'Успешно изтрит потребител');
    }

}
