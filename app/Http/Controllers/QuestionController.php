<?php

namespace App\Http\Controllers;

use App\Question;
use App\Declaration;

class QuestionController extends Controller {

    protected function store(Declaration $declaration) {
        $this->validate(request(), ['name' => 'required|min:1'], ['name.required' => 'Въведете въпрос']);
        $declaration->addQuestion(new Question(request(['name'])));
        return redirect()->back()->with('success', 'Успешно добавен въпрос');
    }

    protected function edit(Question $question) {
        return view('questions/edit', compact('question'));
    }

    protected function update(Question $question) {
        $this->validate(request(), ['name' => 'required|min:1'], ['name.required' => 'Въведете въпрос']);
        $question->update(request(['name']));
        return redirect()->route('declarations.show', $question->declaration_id)->with('success', 'Успешно редактиран въпрос');
    }

    protected function destroy(Question $question) {
        if ($question->answers->isEmpty()) {
            $question->delete();
            return redirect()->back()->with('success', 'Успешно изтрит въпрос');
        } else {
            return redirect()->back()->with('success', 'Въпроса не може да бъде изтрит');
        }
    }

}
