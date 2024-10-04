<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            [   
                'name' => 'Purchase Order',
                'slug' => 'purchase-order',
                'company_role' => 'Buyer',
                'payment_involved'=>1,
                //'statuses'=> ["Draft", "Sent", "Cancelled"]
            ],
            [
                'name' => 'Sales Quotation',
                'slug' => 'sales-quotation', 
                'company_role' => 'Seller', 
                'payment_involved'=>0,
                //'statuses'=> ["Draft", "Sent", "Cancelled"]
            ],
            [
                'name' => 'Sales Order',
                'slug' => 'sales-order', 
                'company_role' => 'Seller', 
                'payment_involved'=>0,
                //'statuses'=> ["Draft", "Sent", "Confirmed", "InTransit", "Delivered"]
            ],
            [
                'name' => 'Customer Invoice',
                'slug' => 'customer-invoice', 
                'company_role' => 'Seller', 
                'payment_involved'=>1,
                //'statuses'=> ["Draft", "Sent", "Paid"]
            ]
        ]);
    }
}
