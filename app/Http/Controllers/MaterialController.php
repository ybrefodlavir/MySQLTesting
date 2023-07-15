<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Material;
use App\Models\MaterialQuestions;
use App\Models\Question;
use App\Models\StundentScore;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {

        // $student = new StundentScore();
        // $student->setScore(1);
        // dd(StundentScore::where('user_id', 1)->first());

        // $score = StundentScore::where('user_id', 1)->first();
        // $score = json_decode($score->score);
        // if (!empty($score)) {
        //     echo $score;
        // } else {
        //     $student = new StundentScore();
        //     $student->setScore(1);
        //     $score = StundentScore::where('user_id', 1)->first();
        //     $score = json_decode($score->score);
        // }

        // echo $score;

        $materials = Material::all()->sortBy("order");
        return view('material', ['materials' => $materials]);
    }

    public function details($material_id)
    {
        $material = Material::find($material_id);
        if ($material) {
            $ids = MaterialQuestions::where('material_id', $material->id)->orderBy('order')->pluck('question_id')->toArray();
            if (!empty($ids)) {
                $ids_ordered = implode(',', $ids);
                $questions = Question::whereIn('id', $ids)
                    ->orderByRaw("FIELD(id, $ids_ordered)")->where('is_active', true)->get();
            } else {
                $questions = [];
            }
            if ($material->is_exam) {
                $question = null;
                $percentage = 0;
                foreach ($questions as $q) {
                    if (!Answer::where([['user_id', request()->user()->id], ['question_id', $q->id]])->exists()) {
                        $question = $q;
                        break;
                    } else {
                        $percentage += round(1 / count($questions) * 100);
                    }
                }
                $score = 0;
                if ($question == null && !empty($questions)) {
                    $score = round(count(Answer::whereIn('question_id', $ids)->where([['user_id', request()->user()->id], ['status', 1]])->get()) / count($questions) * 100);
                    $this->create_score(request()->user()->id, $score, $material_id);
                }
                return view('material_exam', ['material' => $material, 'question' => $question, 'percentage' => $percentage, 'score' => $score]);
            }
            $question = null;
            $score = 0;
            foreach ($questions as $q) {
                if (!Answer::where([['user_id', request()->user()->id], ['status', 1], ['question_id', $q->id]])->exists()) {
                    $question = $q;
                    break;
                } else {
                    $score += round(1 / count($questions) * 100);
                    if ($score == 99) $score += 1;
                    $this->create_score(request()->user()->id, $score, $material_id);
                }
            }

            return view('material_detail', ['material' => $material, 'question' => $question, 'score' => $score]);
        }

        return redirect()->route('home');
    }

    public function download($material_id)
    {
        $material = Material::find($material_id);

        $file = public_path() . $material->path;

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, "$material->name.pdf", $headers);
    }

    private function create_score($user_id, $score, $material_id)
    {
        StundentScore::create([
            'user_id' => $user_id,
            'score' => $score,
            'material_id' => $material_id,

        ]);
    }
}
