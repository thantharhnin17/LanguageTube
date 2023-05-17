<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $levels = Level::all();

        $courses = [];

        foreach ($levels as $level) {
            $languageName = $level->language->language_name;

            $courses[] = [
                'course_name' => $level->level_name . ' - ' . $languageName,
                'course_img' => 'pic' . $level->id . '.jpg',
                'summary' => 'Learn the basics of programming...',
                'description' => 'This course provides an introduction...',
                'level_id' => $level->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Course::insert($courses);
        
    }

}
