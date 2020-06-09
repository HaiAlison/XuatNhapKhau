<?php

use Illuminate\Database\Seeder;

class containerSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $container_size=[];
    
       $container_size[]=[
           'id'=>'ContainerSize_20',
           'container_size'=>'20'
       ];
       $container_size[]=[
        'id'=>'ContainerSize_40',
        'container_size'=>'40'
    ];
    foreach($container_size as $cn)
    {      
        App\ContainerSize::create($cn);
    }

    }
}
