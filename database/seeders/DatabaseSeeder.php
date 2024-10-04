<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UnitSeeder::class,
            PaymentModeSeeder::class,
            StatusSeeder::class,
            DocumentTypeSeeder::class,
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableChunkOneSeeder::class,
            CitiesTableChunkTwoSeeder::class,
            CitiesTableChunkThreeSeeder::class,
            CitiesTableChunkFourSeeder::class,
            CitiesTableChunkFiveSeeder::class,
            CompanySeeder::class,
            AddressSeeder::class,
            UserSeeder::class,
            // ItemSeeder::class,
            ShippingModeSeeder::class,
        ]);
    }
}
