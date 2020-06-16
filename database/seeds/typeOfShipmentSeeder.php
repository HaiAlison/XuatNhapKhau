<?php

use Illuminate\Database\Seeder;

class typeOfShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $type_of_shipment=[];
       $type_of_shipment[]=[
           'id'=>'Vessle',
           'type_of_shipment'=>'Vessle'
       ];
       $type_of_shipment[]=[
        'id'=>'Container',
        'type_of_shipment'=>'Container'
       ];
       foreach($type_of_shipment as $tos)
       {
           App\TypeOfShipment::create($tos);
       }
    }
}
