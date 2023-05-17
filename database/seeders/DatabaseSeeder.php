<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        $this->call([
            UserSeeder::class,
            LanguageSeeder::class,
            LevelSeeder::class,
            CourseSeeder::class,
            BatchSeeder::class,
            TeacherSeeder::class,
            TeacherLevelSeeder::class,
            ClassroomSeeder::class,
            PaymentMethodSeeder::class,
        ]);
    }
}
