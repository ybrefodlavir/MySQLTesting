<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StundentScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'score',
        'material_id',
    ];

    // public function setScore($user_id)
    // {
    //     $studentScore = $this::where('user_id', $user_id)->first();
    //     if ($studentScore == null) $studentScore = new StundentScore();
    //     $materials = Material::all();
    //     if (count($materials) > 0 && $user_id != null) {
    //         $studentScore->user_id = $user_id;
    //         $scores = [];
    //         foreach ($materials as $material) {
    //             $ids = MaterialQuestions::where('material_id', $material->id)->orderBy('order')->pluck('question_id')->toArray();
    //             if (!empty($ids)) {
    //                 $ids_ordered = implode(',', $ids);
    //                 $questions = Question::whereIn('id', $ids)->orderByRaw("FIELD(id, $ids_ordered)")->where('is_active', true)->get();
    //                 $score = 0;
    //                 // $scores[$material->name]['questions']['total_questions'] = count($questions) ?? 0;
    //                 foreach ($questions as $q) {
    //                     if (Answer::where([['user_id', $user_id], ['status', 1], ['question_id', $q->id]])->exists()) {
    //                         $score += round(1 / count($questions) * 100);
    //                         // $scores[$material->name]['questions'][$q->id] = 1;
    //                     } else {
    //                         // $scores[$material->name]['questions'][$q->id] = 0;
    //                     }
    //                 }
    //                 $scores[$material->name]['total_score'] = $score;
    //             }
    //         }
    //         $scores = json_encode($scores);
    //         $studentScore->score = $scores;
    //         $studentScore->save();
    //     }
    // }
}
