<?php

use Illuminate\Database\Seeder;

class POStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $po_status=[];
        $po_status[]=[
            'id'=>'POStatus_ToBeConfirmed',
            'po_status'=>'To be confirmed'
        ];
        $po_status[]=[
            'id'=>'POStatus_Confirmed',
            'po_status'=>'Confirmed'
        ];
        $po_status[]=[
            'id'=>'POStatus_Pending',
            'po_status'=>'Pending'
        ];
        $po_status[]=[
            'id'=>'POStatus_Closed',
            'po_status'=>'Closed'
        ];
        $po_status[]=[
            'id'=>'POStatus_Canceled',
            'po_status'=>'Canceled'
        ];
        $po_status[]=[
            'id'=>'POStatus_Stopped',
            'po_status'=>'Stopped'
        ];
        foreach($po_status as $pos)
        {
            App\POStatus::create($pos);
        }
    }
}
