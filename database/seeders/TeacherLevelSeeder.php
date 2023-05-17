<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Level;
use App\Models\Teacher;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherLevelSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $levelsByLanguage = Level::join('languages', 'levels.language_id', '=', 'languages.id')
        //     ->select('levels.id', 'levels.level_name', 'languages.language_name')
        //     ->groupBy('levels.id', 'levels.level_name', 'languages.language_name')
        //     ->get();

        // $teacherLevels = [];

        // foreach ($levelsByLanguage as $level) {
        //     for ($i = 1; $i <= 6; $i++) {
        //         $teacherLevels[] = [
        //             'teacher_id' => $i, // ID of the teacher
        //             'level_id' => $level->id
        //         ];
        //     }
        // }

        // $teachers = User::where('user_type', 'teacher')->get();

        // $teachers->each(function ($teacher) {
        //     if ($teacher->level) {
        //         $level = Level::where('language_id', $teacher->level->language_id)->first();

        //         if ($level) {
        //             $teacher->teacherLevels()->firstOrCreate(['level_id' => $level->id]);
        //         }
        //     }
        // });
        // Define teacher levels data


        
        $teacherLevels = [
            [
                'teacher_id' => 1, // ID of the teacher
                'level_id' => 1, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 1, // ID of the teacher
                'level_id' => 2, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 1, // ID of the teacher
                'level_id' => 3, // ID of the level associated with the teacher
            ],

            [
                'teacher_id' => 2, // ID of the teacher
                'level_id' => 4, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 2, // ID of the teacher
                'level_id' => 5, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 2, // ID of the teacher
                'level_id' => 6, // ID of the level associated with the teacher
            ],

            [
                'teacher_id' => 3, // ID of the teacher
                'level_id' => 7, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 3, // ID of the teacher
                'level_id' => 8, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 3, // ID of the teacher
                'level_id' => 9, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 4, // ID of the teacher
                'level_id' => 10, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 4, // ID of the teacher
                'level_id' => 11, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 4, // ID of the teacher
                'level_id' => 12, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 5, // ID of the teacher
                'level_id' => 13, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 5, // ID of the teacher
                'level_id' => 14, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 5, // ID of the teacher
                'level_id' => 15, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 6, // ID of the teacher
                'level_id' => 16, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 6, // ID of the teacher
                'level_id' => 17, // ID of the level associated with the teacher
            ],
            [
                'teacher_id' => 6, // ID of the teacher
                'level_id' => 18, // ID of the level associated with the teacher
            ],
        ];

        // // Insert the teacher levels data into the table
        DB::table('teacher_levels')->insert($teacherLevels);
    }

}
