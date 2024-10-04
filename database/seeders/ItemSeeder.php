<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('items')->insert([
            [
                'sku' => 'SKU001',
                'name' => 'Item 1',
                'description' => 'Description 1',
                'price' => 100,
                'tax' => 0.11,
                // 'instock' => 100,
                'hsn_code' => 'HSN001',
                'sac_code' => 'SAC001',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sku' => 'SKU002',
                'name' => 'Item 2',
                'description' => 'Description 2',
                'price' => 200,
                'tax' => 0.11,
                // 'instock' => 100,
                'hsn_code' => 'HSN002',
                'sac_code' => 'SAC002',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'sku' => 'SKU003',
                'name' => 'Item 3',
                'description' => 'Description 3',
                'price' => 300,
                'tax' => 0.11,
                // 'instock' => 100,
                'hsn_code' => 'HSN003',
                'sac_code' => 'SAC003',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
