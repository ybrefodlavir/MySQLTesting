<?php

namespace App\Http\Controllers;

use App\Models\MaterialQuestions;
use App\Models\Question;
use App\Models\Material;
use Illuminate\Http\Request;


class DosenManageSoalController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        $questions = Question::all();
        $materialqs = MaterialQuestions::all();
        return view('dosen/dosen_manage_soal', compact(['materials', 'questions', 'materialqs']));
    }
    public function edit(Request $request, $id)
    {
        $materials = Material::all();
        $questions = Question::all();
        $materialq = MaterialQuestions::find($id);
        return view('dosen.dosen_manage_soal_edit', compact(['materials', 'questions', 'materialq']));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'material_id' => 'required',
            'question_id' => 'required',
            'order' => 'required',
        ]);

        $materialq = MaterialQuestions::find($id);

        $materialq->material_id = $request->get('material_id');
        $materialq->question_id = $request->get('question_id');
        $materialq->order = $request->get('order');

        $materialq->save();

        return to_route('dosen_manage_soal');
    }
    public function create()
    {
        $materials = Material::all();
        $questions = Question::all();
        $materialq = MaterialQuestions::all();
        return view('dosen.dosen_manage_soal_create', compact(['materials', 'questions', 'materialq']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required',
            'question_id' => 'required',
            'order' => 'required',
        ]);

        MaterialQuestions::create([
            'material_id' => $request->get('material_id'),
            'question_id' => $request->get('question_id'),
            'order' => $request->get('order'),
        ]);

        return to_route('dosen_manage_soal');
    }

    public function delete($id)
    {
        MaterialQuestions::find($id)->delete();
        return to_route('dosen_manage_soal');
    }
}
