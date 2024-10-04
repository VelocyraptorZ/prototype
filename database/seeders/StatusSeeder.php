<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['name' => 'Draft'],
            ['name' => 'Sent'],
            ['name' => 'Creative Uploaded'],
            ['name' => 'Approved'],
            ['name' => 'Received'],
            ['name' => 'Quality Checked'],
            ['name' => 'Pending'],
            ['name' => 'Confirmed'],
            ['name' => 'Printed'],
            ['name' => 'Packed'],
            ['name' => 'Shipped'],
            ['name' => 'InTransit'],
            ['name' => 'Delivered'],
            ['name' => 'Returned'],
            ['name' => 'Cancelled'],
            ['name' => 'Refunded'],
        ]);
    }
}
