<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define language data
        $languages = [
            ['language_name' => 'English'],
            ['language_name' => 'Japanese'],
            ['language_name' => 'Chinese'],
            ['language_name' => 'Korean'],
            ['language_name' => 'Thai'],
            ['language_name' => 'French'],
            // Add more languages as needed
        ];

        // Insert the language data into the table
        DB::table('languages')->insert($languages);
    }
}
