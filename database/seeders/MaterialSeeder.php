<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::insert([
            [
                'name' => 'Materi Insert',
                'description' => 'Materi Insert',
                'order' => 1,
                'color' => 'red-500',
                'is_exam' => false,
                'path' => '/materials/Materi SQL DML INSERT.pdf',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Materi Update',
                'description' => 'Materi Update',
                'order' => 2,
                'color' => 'blue-500',
                'is_exam' => false,
                'path' => '/materials/Materi SQL DML UPDATE.pdf',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Materi Delete',
                'description' => 'Materi Delete',
                'order' => 3,
                'color' => 'yellow-500',
                'is_exam' => false,
                'path' => '/materials/Materi SQL DML DELETE.pdf',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Exam',
                'description' => 'Exam',
                'order' => 4,
                'color' => 'green-500',
                'is_exam' => true,
                'path' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
