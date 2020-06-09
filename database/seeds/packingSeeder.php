<?php

use Illuminate\Database\Seeder;

class packingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packing=[];
        $packing[]=[
            'id'=>'Packing_Bulk',
            'packing'=>'Bulk'
        ];
        $packing[]=[
            'id'=>'Packing_SB',
            'packing'=>'SB'
        ];
        $packing[]=[
            'id'=>'Packing_JB',
            'packing'=>'JB'
        ];
        foreach($packing as $pk)
        {
            App\Packing::create($pk);
        }
        
    }
}
