<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $teachers = [];

        for ($i = 1; $i < 7; $i++) {
            $teachers[] = [
                'user_id' => $i,
                'recruit_id' => null,
                'type' => 0,
                'time' => 0,
                'education' => 'Bachelor of Science',
                'university' => 'Example University',
                'cv_form' => 'example_cv.pdf',
                'comment' => 'Additional comments',
                'status' => 'Accepted',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Teacher::insert($teachers);
}

}
