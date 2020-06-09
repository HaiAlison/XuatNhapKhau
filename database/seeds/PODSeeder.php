<?php

use Illuminate\Database\Seeder;

class PODSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pod=[];
        $pod[]=[
            'id'=>'POD_HP',
            'pod_name'=>'Hai Phong'
        ];
        $pod[]=[
            'id'=>'POD_HCM',
            'pod_name'=>'Ho Chi Minh'
        ];
        $pod[]=[
            'id'=>'POD_PM',
            'pod_name'=>'Phu My'
        ];
        foreach($pod as $pd)
        {
            App\POD::create($pd);
        }
    }
}
