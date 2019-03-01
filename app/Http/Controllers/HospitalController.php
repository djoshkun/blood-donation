<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\City;

class HospitalController extends Controller {

    protected function index() {
        $hospitals = Hospital::all();
        return view('hospitals/index', compact('hospitals'));
    }

    protected function create() {
        $cities = City::pluck('name', 'id');
        return view('hospitals/create', compact('cities'));
    }

    protected function store() {
        $this->validate(request(), ['name' => 'required|min:1', 'city_id' => 'required'], ['name.required' => 'Въведете име', 'city_id.required' => 'Моля изберете град']);
        Hospital::create(request(['name', 'city_id']));
        return redirect()->route('hospitals.index')->with('success', 'Успешно добавена болница');
    }

    protected function show(Hospital $hospital) {
        return view('hospitals/show', compact('hospital'));
    }

    protected function edit(Hospital $hospital) {
        $cities = City::pluck('name', 'id');
        return view('hospitals/edit', compact('cities', 'hospital'));
    }

    protected function update(Hospital $hospital) {
        $this->validate(request(), ['name' => 'required|min:1', 'city_id' => 'required'], ['name.required' => 'Въведете име', 'city_id.required' => 'Моля изберете град']);
        $hospital->update(request(['name', 'city_id']));
        return redirect()->route('hospitals.index')->with('success', 'Успешно редактирана болница');
    }

    protected function destroy(Hospital $hospital) {
        $hospital->delete();
        return redirect()->back()->with('success', 'Успешно изтрита болница');
    }

}
