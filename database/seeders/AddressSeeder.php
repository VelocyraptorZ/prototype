<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'line1' => 'Jl Company Management 1 No 1',
                'line2' => 'Jl Company Management 2 No 2',
                'landmark' => 'CM Landmark',
                'pin' => '000001',
                'gstin' => 'USA',
                'city_id' => 56293,
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'line1' => 'Jl Company Turning 1 No 1',
                'line2' => 'Jl Company Turning 2 No 2',
                'landmark' => 'CT Landmark',
                'pin' => '000002',
                'gstin' => 'USA',
                'city_id' => 57012,
                'company_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more addresses as needed
        ]);
    }
}