<?php

use Illuminate\Database\Seeder;

class supplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier=[];
        $supplier[]=[
            'id'=>'Supplier_1',
            'supplier'=>'Supplier 1'
        ];
        $supplier[]=[
            'id'=>'Supplier_2',
            'supplier'=>'Supplier 2'
        ];
        $supplier[]=[
            'id'=>'Supplier_3',
            'supplier'=>'Supplier 3'
        ];
        foreach($supplier as $sl)
        {
            App\Supplier::create($sl);
        }
    }
}
