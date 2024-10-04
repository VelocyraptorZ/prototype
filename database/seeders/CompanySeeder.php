<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'Company Management',
                'email' => 'company_management@mail.com',
                'mobile' => '123456790',
                'user_id' => 1,
                'contact_person_name' => 'Management Person',
                'contact_person_email' => 'management_person@gmail.com',
                'contact_person_mobile' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company Turning',
                'email' => 'company_turning@mail.com',
                'mobile' => '123456790',
                'user_id' => 2,
                'contact_person_name' => 'Turning Person',
                'contact_person_email' => 'turning_person@gmail.com',
                'contact_person_mobile' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
