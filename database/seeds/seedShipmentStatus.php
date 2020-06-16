<?php

use Illuminate\Database\Seeder;

class seedShipmentStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipmentStastus=[];
        $shipmentStastus[]=[
            'id'=>'ShipmentStatus_Arrived',
            'shipment_status'=>'Arrived'
        ];
        $shipmentStastus[]= [
            'id'=>'ShipmentStatus_InTransit',
            'shipment_status'=>'InTransit'
           
        ];
       $shipmentStastus[]=[
        'id'=>'ShipmentStatus_Pending',
        'shipment_status'=>'Pending'
       ];
        foreach($shipmentStastus as $sm)
        {
            App\ShipmentStatus::create($sm);
        }
       
    }
}
