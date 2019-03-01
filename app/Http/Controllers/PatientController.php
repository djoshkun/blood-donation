<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientForm;
use App\Hospital;
use App\User;

class PatientController extends Controller {

    protected function index() {
        $patients = User::allPatients();
        return view('patients/index', compact('patients'));
    }

    protected function create() {
        $hospitals = Hospital::pluck('name', 'id');
        return null === auth()->user()->egn ? redirect()->route('profile')->with('success', 'За да може да добавите пациент трябва да попълните данните си') : view('patients/create', compact('hospitals'));
    }

    protected function store(PatientForm $form) {
        User::create([
            'role' => User::ROLE_PATIENT,
            'name' => request('name'),
            'fathersname' => request('fathersname'),
            'surname' => request('surname'),
            'blood_type' => request('blood_type'),
            'hospital_id' => request('hospital_id'),
            'gender' => request('gender'),
            'added_by' => auth()->id(),
            'blood_quantity' => request('blood_quantity'),
            'count_blood_quantity' => request('count_blood_quantity')
        ]);
        return redirect()->route('patients.index')->with('success', 'Успешно добавихте нуждаещ от кръв');
    }

    protected function edit(User $user) {
        $hospitals = Hospital::pluck('name', 'id');
        return view('patients/edit', compact('user', 'hospitals'));
    }

    protected function update(User $user, PatientForm $form) {
        $user->update([
            'name' => request('name'),
            'fathersname' => request('fathersname'),
            'surname' => request('surname'),
            'blood_type' => request('blood_type'),
            'hospital_id' => request('hospital_id'),
            'gender' => request('gender'),
            'added_by' => auth()->id(),
            'blood_quantity' => request('blood_quantity'),
            'count_blood_quantity' => request('count_blood_quantity')
        ]);
        return redirect()->route('users.index')->with('success', 'Успешно редактиран пациент');
    }

}
