<?php

namespace Database\Seeders;

use App\Models\MaterialQuestions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaterialQuestions::insert([
            [
                'material_id' => 1,
                'question_id' => 1,
                'order' => 1,
            ],
            [
                'material_id' => 1,
                'question_id' => 2,
                'order' => 2,
            ],
            [
                'material_id' => 1,
                'question_id' => 3,
                'order' => 3,
            ],
            [
                'material_id' => 1,
                'question_id' => 4,
                'order' => 4,
            ],
            [
                'material_id' => 2,
                'question_id' => 5,
                'order' => 1,
            ],
            [
                'material_id' => 2,
                'question_id' => 6,
                'order' => 2,
            ],
            [
                'material_id' => 2,
                'question_id' => 7,
                'order' => 3,
            ],
            [
                'material_id' => 4,
                'question_id' => 10,
                'order' => 1,
            ],
            [
                'material_id' => 4,
                'question_id' => 11,
                'order' => 2,
            ],
            [
                'material_id' => 4,
                'question_id' => 12,
                'order' => 3,
            ],
            [
                'material_id' => 4,
                'question_id' => 13,
                'order' => 4,
            ],
        ]);
    }
}
