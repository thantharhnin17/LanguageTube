<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define batch data
        $batches = [
            ['batch_name' => 'Batch 01'],
            ['batch_name' => 'Batch 02'],
            ['batch_name' => 'Batch 03'],
            ['batch_name' => 'Batch 04'],
            ['batch_name' => 'Batch 05'],
        ];

        // Insert the batch data into the table
        DB::table('batches')->insert($batches);
    }
}
