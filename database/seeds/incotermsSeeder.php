<?php

use Illuminate\Database\Seeder;

class incotermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incoterms=[];
        $incoterms[]=[
            'id'=>'Incoterms_CFR',
            'incoterms'=>'CFR'
        ];
        $incoterms[]=[
            'id'=>'Incoterms_CIF',
            'incoterms'=>'CIF'
        ];
        $incoterms[]=[
            'id'=>'Incoterms_FOB',
            'incoterms'=>'FOB'
        ];
        foreach($incoterms as $in)
        {
            App\Incoterm::create($in);
        }
    }
}
