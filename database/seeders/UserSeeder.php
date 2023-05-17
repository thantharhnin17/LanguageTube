<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
        $tNames = ['Su Su', 'Mg Mg', 'Kaung Kaung', 'Moe Moe', 'Lin Lin', 'Aye Aye'];
        $tEmails = ['susu@gmail.com', 'mgmg@gmail.com', 'kaung@gmail.com', 'moe@gmail.com', 'lin@gmail.com', 'aye@gmail.com'];

        $names = ['Kyaw Kyaw', 'Ma Ma', 'Hla Hla', 'Zaw Zaw', 'Aung Aung', 'Khin Khin', 'Win Win', 'Htoo Htoo', 'Shwe Sin', 'Naing Naing', 'Lamin', 'Oo Oo', 'Myo Myo', 'Nyi Nyi', 'Yamin'];
        $emails = ['kyaw@gmail.com','ma@gmail.com','hla@gmail.com','zaw@gmail.com','aung@gmail.com','khin@gmail.com','win@gmail.com','htoo@gmail.com','shwe@gmail.com','naing@gmail.com','lamin@gmail.com','oo@gmail.com','myo@gmail.com','nyi@gmail.com','yamin@gmail.com'];

        $now = Carbon::now();
        $oneYearsAgo = $now->copy()->subYears(1);

        foreach ($tNames as $key => $name) {
            User::create([
                'name' => $name,
                'email' => $tEmails[$key],
                'email_verified_at' => null,
                'password' => Hash::make('11111111'),
                'user_type' => 'teacher',
                'photo' => 'user' . ($key + 1) . '.jpg',
                'phone' => '1234567890',
                'dob' => Carbon::parse('1990-01-01'),
                'gender' => 'female',
                'created_at' => $oneYearsAgo->copy()->addDays($key),
                'updated_at' => $oneYearsAgo->copy()->addDays($key),
            ]);
        }

        foreach ($names as $key => $name) {
            User::create([
                'name' => $name,
                'email' => $emails[$key],
                'email_verified_at' => null,
                'password' => Hash::make('11111111'),
                'user_type' => 'user',
                'photo' => 'user' . ($key + 6) . '.jpg',
                'phone' => '1234567890',
                'dob' => Carbon::parse('1990-01-01'),
                'gender' => 'male',
                'created_at' => $oneYearsAgo->copy()->addDays($key),
                'updated_at' => $oneYearsAgo->copy()->addDays($key),
            ]);
        }

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_type' => 'admin',
            'password' => Hash::make('12345678'),
            'photo' => 'admin.jpg',
            'phone' => '1234567890',
            'dob' => '2000-01-01',
            'gender' => 'male',
            'created_at' => $oneYearsAgo->copy()->addDays(14),
            'updated_at' => $oneYearsAgo->copy()->addDays(14),
        ]);

    }
}
// class UserSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
        

//         // Generate random dates within the last three years
//         $startDate = Carbon::now()->subYears(1);
//         $endDate = Carbon::now();
        
//         // $randomDate = Carbon::createFromTimestamp(rand($threeYearsAgo->timestamp, $now->timestamp));

//         User::create([
//             'name' => 'admin',
//             'email' => 'admin@gmail.com',
//             'user_type' => 'admin',
//             'password' => Hash::make('12345678'),
//             'photo' => 'admin.jpg',
//             'phone' => '1234567890',
//             'dob' => '2000-01-01',
//             'gender' => 'male',
//             'created_at' => Carbon::now()->subYears(3)
//         ]);

//         $now = Carbon::now();
//         $threeYearsAgo = $now->subYears(3);

//         $tNames = ['Su Su','Mg Mg','Kaung Kaung','Moe Moe','Lin Lin','Aye Aye'];
//         $tEmails = ['susu@gmail.com','mgmg@gmail.com','kaung@gmail.com','moe@gmail.com','lin@gmail.com','aye@gmail.com'];

//         $names = ['Kyaw Kyaw','Ma Ma',
//                     'Hla Hla','Zaw Zaw','Aung Aung','Khin Khin','Win Win','Htoo Htoo','Shwe Sin',
//                     'Naing Naing','Lamin','Oo Oo','Myo Myo','Nyi Nyi','Yamin'];

//         $emails = ['kyaw@gmail.com','ma@gmail.com','hla@gmail.com','zaw@gmail.com','aung@gmail.com','khin@gmail.com','win@gmail.com','htoo@gmail.com','shwe@gmail.com','naing@gmail.com','lamin@gmail.com','oo@gmail.com','myo@gmail.com','nyi@gmail.com','yamin@gmail.com'];

//         for($i=0; $i<6; $i++){
//             $j = 1;
//             // Generate a random date within the last 3 years
//             $randomDate = Carbon::createFromTimestamp(rand($threeYearsAgo->timestamp, $now->timestamp));
    
//             User::create([
//                 'name' => $tNames[$i],
//                 'email' => $tEmails[$i],
//                 'email_verified_at' => null,
//                 'password' => Hash::make('11111111'),
//                 'user_type' => 'teacher',
//                 'photo' => 'user'.$j.'.jpg',
//                 'phone' => '1234567890',
//                 'dob' => Carbon::parse('1990-01-01'),
//                 'gender' => 'female',
//                 'created_at' => $randomDate
//             ]);

//             $j++;
//         }

//         for ($i=0; $i<15; $i++) {
//             $j = 6;
//             // Generate a random date within the last 3 years
//             $randomDate = Carbon::createFromTimestamp(rand($threeYearsAgo->timestamp, $now->timestamp));
    
//             User::create([
//                 'name' => $names[$i],
//                 'email' => $emails[$i],
//                 'email_verified_at' => null,
//                 'password' => Hash::make('11111111'),
//                 'user_type' => 'user',
//                 'photo' => 'user'.$j.'.jpg',
//                 'phone' => '1234567890',
//                 'dob' => Carbon::parse('1990-01-01'),
//                 'gender' => 'male',
//                 'created_at' => $randomDate
//             ]);

//             $j++;
//         }

        
//     }

    
// }
