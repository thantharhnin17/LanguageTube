<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Get language IDs from the language table
        $english = Language::where('language_name', 'English')->first();
        $japanese = Language::where('language_name', 'Japanese')->first();
        $chinese = Language::where('language_name', 'Chinese')->first();
        $korean = Language::where('language_name', 'Korean')->first();
        $thai = Language::where('language_name', 'Thai')->first();
        $french = Language::where('language_name', 'French')->first();

        // Define level data
        $levels = [
            ['level_name' => 'Beginner', 'language_id' => $english->id],
            ['level_name' => 'Intermediate', 'language_id' => $english->id],
            ['level_name' => 'Advanced', 'language_id' => $english->id],
            ['level_name' => 'N5', 'language_id' => $japanese->id],
            ['level_name' => 'N4', 'language_id' => $japanese->id],
            ['level_name' => 'N3', 'language_id' => $japanese->id],
            ['level_name' => 'HSK Level 1', 'language_id' => $chinese->id],
            ['level_name' => 'HSK Level 2', 'language_id' => $chinese->id],
            ['level_name' => 'HSK Level 1', 'language_id' => $chinese->id],
            ['level_name' => 'Level 1', 'language_id' => $korean->id],
            ['level_name' => 'Level 2', 'language_id' => $korean->id],
            ['level_name' => 'Level 3', 'language_id' => $korean->id],
            ['level_name' => 'Level 1', 'language_id' => $thai->id],
            ['level_name' => 'Level 2', 'language_id' => $thai->id],
            ['level_name' => 'Level 3', 'language_id' => $thai->id],
            ['level_name' => 'Level 1', 'language_id' => $french->id],
            ['level_name' => 'Level 2', 'language_id' => $french->id],
            ['level_name' => 'Level 3', 'language_id' => $french->id],
        ];

        // Insert the level data into the table
        DB::table('levels')->insert($levels);
    }
}
