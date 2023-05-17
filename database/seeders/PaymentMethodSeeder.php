<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define payment method data
    $paymentMethods = [
        [
            'payName' => 'Kpay',
            'accName' => 'John Doe',
            'accNo' => '1234567890',
            'logo' => 'kpay.png',
        ],
        [
            'payName' => 'Wave Pay',
            'accName' => 'John Doe',
            'accNo' => '9876543210',
            'logo' => 'wave.png',
        ],
        [
            'payName' => 'CB Pay',
            'accName' => 'John Doe',
            'accNo' => '9876543210',
            'logo' => 'cb.png',
        ],[
            'payName' => 'UAB Pay',
            'accName' => 'John Doe',
            'accNo' => '9876543210',
            'logo' => 'uab.jpg',
        ],[
            'payName' => 'AYA Pay',
            'accName' => 'John Doe',
            'accNo' => '9876543210',
            'logo' => 'aya.jpg',
        ],
    ];

    // Insert the payment method data into the table
    DB::table('payment_methods')->insert($paymentMethods);
    }
}
