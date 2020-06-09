<?php

use Illuminate\Database\Seeder;

class originSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $origins=[];
        $origins[]=[
            'id'=>'Origin_CN',
            'origin_name'=>'China'
        ];
        $origins[]=[
            'id'=>'Origin_BGR',
            'origin_name'=>'Bulgaria'
        ];
        $origins[]=[
            'id'=>'Origin_GMN',
            'origin_name'=>'Germany'
        ];
        $origins[]=[
            'id'=>'Origin_IDA',
            'origin_name'=>'India'
        ];
        $origins[]=[
            'id'=>'Origin_USA',
            'origin_name'=>'USA'
        ];
        foreach($origins as $org)
        {
            App\Origin::create($org);
        }

    }
}
