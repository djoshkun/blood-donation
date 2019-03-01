<?php

namespace App\Http\Controllers;

use App\Declaration;

class DeclarationController extends Controller {

    protected function index() {
        $declarations = Declaration::all();
        return view('declarations/index', compact('declarations'));
    }

    protected function create() {
        return view('declarations/create');
    }

    protected function store() {
        $this->validate(request(), ['name' => 'required|min:1|max:255', 'active' => 'required|in:0,1']);
        Declaration::create(request(['name', 'active']));
        return redirect()->route('declarations.index')->with('success', 'Успешно добавена декларация');
    }

    protected function show(Declaration $declaration) {
        return view('declarations/show', compact('declaration'));
    }

    protected function edit(Declaration $declaration) {
        return view('declarations/edit', compact('declaration'));
    }

    protected function update(Declaration $declaration) {
        $this->validate(request(), ['name' => 'required|min:1|max:255', 'active' => 'required|in:0,1']);
        $declaration->update(request(['name', 'active']));
        return redirect()->route('declarations.index')->with('success', 'Успешно редактирана декларация');
    }

    protected function destroy(Declaration $declaration) {
        $declaration->delete();
        return redirect()->back()->with('success', 'Успешно изтрита декларация');
    }

}
