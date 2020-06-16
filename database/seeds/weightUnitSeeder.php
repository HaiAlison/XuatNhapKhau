<?php

use Illuminate\Database\Seeder;

class weightUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weightUnit=[];
        $weightUnit[]=[
            'id'=>'WeightUnit_25',
            'weight_unit'=>25
        
        ];
        $weightUnit[]=[
            'id'=>'WeightUnit_40',
            'weight_unit'=>40
        
        ];
        $weightUnit[]=[
            'id'=>'WeightUnit_40',
            'weight_unit'=>40
        
        ];
        $weightUnit[]=[
            'id'=>'WeightUnit_50',
            'weight_unit'=>50
        
        ];
        $weightUnit[]=[
            'id'=>'WeightUnit_700',
            'weight_unit'=>700
        
        ];
        $weightUnit[]=[
            'id'=>'WeightUnit_750',
            'weight_unit'=>750
        
        ];
        $weightUnit[]=[
            'id'=>'WeightUnit_1000',
            'weight_unit'=>1000
        
        ];
        $weightUnit[]=[
            'id'=>'WeightUnit_1200',
            'weight_unit'=>1200
        
        ];
        foreach($weightUnit as $wu)
        {
            App\WeightUnit::create($wu);
        }
       
    }
}
