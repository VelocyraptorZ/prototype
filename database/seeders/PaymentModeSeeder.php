<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_modes')->insert([
            ['name' => 'Cheque'],
            ['name' => 'NEFT'],
            ['name' => 'RTGS'],
            ['name' => 'IMPS'],
            ['name' => 'UPI'],
            ['name' => 'Others'],
        ]);
    }
}
