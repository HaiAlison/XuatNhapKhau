<?php

use Illuminate\Database\Seeder;

class bindingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $binding=[];
        $binding[]=[
            'id'=>'Binding_Loose',
            'binding'=>'Loose'
        ];
        $binding[]=[
            'id'=>'Binding_InSling',
            'binding'=>'In_Sling'
        ];
        $binding[]=[
            'id'=>'Binding_InJB',
            'binding'=>'In_JB'
        ];
        foreach($binding as $bin)
        {
            App\Binding::create($bin);
        }
    }
}
