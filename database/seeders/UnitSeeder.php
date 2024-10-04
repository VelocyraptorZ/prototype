<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            ['name' => 'Number','remark' => 'Quantity'],
            ['name' => 'Piece','remark' => 'Quantity'],
            ['name' => 'Kg','remark' => 'Weight'],
            ['name' => 'Gram','remark' => 'Weight'],
            ['name' => 'Ltr','remark' => 'For Liquid'],
            ['name' => 'Meter','remark' => 'For Fabric'],
        ]);
    }
}
