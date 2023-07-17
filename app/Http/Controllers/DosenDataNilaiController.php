<?php

namespace App\Http\Controllers;


use App\Models\Material;
use App\Models\StundentScore;
use App\Models\User;
use Illuminate\Http\Request;


class DosenDataNilaiController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        $users = User::all();
        $student_scores = StundentScore::all();
        return view('dosen/dosen_data_nilai', compact(['materials', 'users', 'student_scores']));
    }
    public function edit(Request $request, $id)
    {
        $materials = Material::all();
        $users = User::all();
        $student_score = StundentScore::find($id);
        return view('dosen.dosen_data_nilai_edit', compact(['materials', 'users', 'student_score']));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'user_id' => 'required',
            'material_id' => 'required',
            'score' => 'required',
        ]);

        $student_score = StundentScore::find($id);

        $student_score->user_id = $request->get('user_id');
        $student_score->material_id = $request->get('material_id');
        $student_score->score = $request->get('score');

        $student_score->save();

        return to_route('dosen_data_nilai');
    }


    public function delete($id)
    {
        StundentScore::find($id)->delete();
        return to_route('dosen_data_nilai');
    }
}
