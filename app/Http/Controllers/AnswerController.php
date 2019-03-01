<?php

namespace App\Http\Controllers;

use App\Declaration;
use App\Answer;
use App\User;
use App\Http\Requests\AnswerForm;
use App\Http\Requests\QuestionTwoForm;
use App\Hospital;
use App\Donation;
use App\DonorDeclaration;

class AnswerController extends Controller {

    protected function indexOne() {
        if (session()->get('answers')) {
            return redirect()->route('answers.index.two');
        }
        $declaration = Declaration::activeDeclaration();
        return null === auth()->user()->egn ? redirect()->route('profile')->with('success', 'За да може да дарите кръв трябва да попълните данните си') : view('answers/index_one', compact('declaration'));
    }

    protected function indexTwo() {
        return null !== session()->get('answers') ? view('answers/index_two') : redirect()->back()->with('success', 'Не сте минали първа стъпка');
    }

    protected function storeOne(AnswerForm $form) {
        session()->put('answers', request('answer'));
        return redirect()->route('answers.index.two');
    }

    protected function storeTwo(QuestionTwoForm $form) {
        $declaration = Declaration::activeDeclaration();
        $donor_declaration = DonorDeclaration::create(['donor_id' => auth()->id(), 'declaration_id' => $declaration->id]);
        foreach (session()->get('answers') as $key => $value) {
            Answer::create(['donor_declaration_id' => $donor_declaration->id, 'question_id' => $key, 'answer' => $value]);
        }
        Donation::create([
            'donor_id' => auth()->id(),
            'patient_id' => request('search') !== null ? request('search') : null,
            'donor_declaration_id' => $donor_declaration->id
        ]);
        $patient = User::find(request('search'));
        if ($patient) {
            $patient->update(['count_blood_quantity' => ++$patient->count_blood_quantity]);
        }
        session()->forget('answers');
        return redirect()->route('results')->with('success', 'Успешно попълнихте анкетата за кръводаряване');
    }

    protected function autoload() {
        $json = [];
        $hospitals = Hospital::all();
        foreach ($hospitals as $hospital) {
            $json[] = [
                'hospital' => $hospital->name,
                'people' => $hospital->patients
            ];
        }
        return response()->json($json);
    }

}
