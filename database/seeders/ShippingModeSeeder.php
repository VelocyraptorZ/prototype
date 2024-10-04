<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ShippingModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shipping_modes')->insert([
            ['name' => 'Hand Delivery'],
            ['name' => 'Air Cargo'],
            ['name' => 'Air Courier'],
            ['name' => 'Surface Courier'],
            ['name' => 'Porter'],
            ['name' => 'Bus Cargo'],
            ['name' => 'Bus Courier'],
        ]);
    }
}