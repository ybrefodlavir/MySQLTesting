<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;


class DosenBankSoalController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('dosen.dosen_bank_soal', compact(['questions']));
    }
    public function edit(Request $request, $id)
    {

        $question = Question::find($id);

        $question_types = Question::$TypesSpecific;
        $question_difficulty = Question::$Difficulties;
        return view('dosen.dosen_bank_soal_edit', compact(['question', 'question_types', 'question_difficulty']));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'question' => 'required',
            'type' => 'required',
            'validation_statement' => 'required',
            'validation_value' => 'required',
            'difficulty' => 'required',
        ]);

        $question = Question::find($id);

        $question->question = $request->get('question');
        $question->type = $request->get('type');
        $question->validation_statement = $request->get('validation_statement');
        $question->validation_value = $request->get('validation_value');
        $question->difficulty = $request->get('difficulty');

        $question->save();

        return to_route('dosen_bank_soal');
    }

    public function create()
    {
        $question_types = Question::$TypesSpecific;
        $question_difficulty = Question::$Difficulties;
        return view('dosen.dosen_bank_soal_create', compact(['question_types', 'question_difficulty']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'type' => 'required',
            'validation_statement' => 'required',
            'validation_value' => 'required',
            'difficulty' => 'required',
        ]);

        Question::create([
            'question' => $request->get('question'),
            'type' => $request->get('type'),
            'validation_statement' => $request->get('validation_statement'),
            'validation_value' => $request->get('validation_value'),
            'difficulty' => $request->get('difficulty'),
        ]);

        return to_route('dosen_bank_soal');
    }

    public function delete(Request $request, $id)
    {
        Question::find($id)->delete();
        return to_route('dosen_bank_soal');
    }
}
