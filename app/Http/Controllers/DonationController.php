<?php

namespace App\Http\Controllers;

use App\Donation;
use App\User;
use App\Http\Requests\ResultForm;
use App\Http\Requests\DeclarationForm;

class DonationController extends Controller {

    protected function indexDoctor() {
        $waiting_declarations = Donation::waitingDeclarations()->get();
        $declarations = Donation::declarations()->get();
        return null === auth()->user()->egn ? redirect()->route('profile')->with('success', 'За да може да проверите декларации трябва да попълните данните си') : view('donations/index_doctor', compact('waiting_declarations', 'declarations'));
    }

    protected function showDoctor(Donation $donation) {
        return view('donations/show_doctor', compact('donation'));
    }

    protected function storeDoctor(DeclarationForm $form, Donation $donation) {
        $donation->donor->update(['blood_type' => request('blood_type')]);
        $donation->update(['description' => request('description'), 'doctor_id' => auth()->id(), 'flag' => 1]);
        return redirect()->route('donations.index.doctor')->with('success', 'Успешно одобрихте декларация на донор');
    }

    protected function indexLaborant() {
        $waiting_donations = Donation::waitingForResults()->get();
        $donations = Donation::finishedResults()->get();
        return view('donations/index_laborant', compact('waiting_donations', 'donations'));
    }

    protected function updateLaborant(Donation $donation, ResultForm $form) {
        $donation->update([
            'hiv_spin' => (int) request('hiv_spin')[$donation->id],
            'hepatitis_b' => (int) request('hepatitis_b')[$donation->id],
            'hepatitis_c' => (int) request('hepatitis_c')[$donation->id],
            'syphilis' => (int) request('syphilis')[$donation->id],
            'laborant_id' => auth()->id()
        ]);
        return redirect()->back()->with('success', 'Успешно добавихте резултати');
    }

    protected function results() {
        $user = User::find(auth()->id());
        return view('users/results', compact('user'));
    }

    protected function destroy(Donation $donation) {
        $donation->donorDeclaration->delete();
        $donation->delete();
        return redirect()->back()->with('success', 'Успешно изтрита декларация');
    }

}
