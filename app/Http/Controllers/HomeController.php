<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            error_log("masuk yang lain");
            return redirect()->route('dashboard');
        } else if (Auth::user()->is_admin == '1') {
            error_log("masuk admin");
            return redirect()->route('dosen_bank_soal');
        } else {
            error_log("masuk mahasiswa");
            return redirect()->route('home');
        }

        $last_question = Answer::where([['user_id', request()->user()->id], ['status', 1]])->latest()->first();
        if ($last_question == null) {
            $question = Question::first();
        } else {
            $question = Question::where('id', '>', $last_question->question_id)->orderBy('id', 'asc')->first();
        }

        return view('welcome', ['question' => $question]);
    }
}
