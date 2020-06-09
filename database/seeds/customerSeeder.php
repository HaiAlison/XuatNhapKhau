<?php

use Illuminate\Database\Seeder;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer=[];
        $customer[]=[
            'id'=>'Customers_1',
            'customer_name'=>'Customers 1'
        ];
        $customer[]=[
            'id'=>'Customers_2',
            'customer_name'=>'Customers 2'
        ];
        $customer[]=[
            'id'=>'Customers_3',
            'customer_name'=>'Customers 3'
        ];
        foreach($customer as $ct)
        {
            App\Customer::create($ct);
        }
    }
}
