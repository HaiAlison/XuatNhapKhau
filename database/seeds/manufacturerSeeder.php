<?php

use Illuminate\Database\Seeder;

class manufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturer=[];
        $manufacturer[]=[
            'id'=>'Manufacture_1',
            'manufacturer_name'=>'Manufacture 1',
            'manufacturer_address'=>'501, West Third Street, Winona Mn, 55987, USA'
        ];
        $manufacturer[]=[
            'id'=>'Manufacture_2',
            'manufacturer_name'=>'Manufacture 2',
            'manufacturer_address'=>'501, West Third Street, Winona Mn, 55987, USA'
        ];
        $manufacturer[]=[
            'id'=>'Manufacture_3',
            'manufacturer_name'=>'Manufacture 3',
            'manufacturer_address'=>'501, West Third Street, Winona Mn, 55987, USA'
        ];
    }
}
