<?php

use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=[];
        $product[]=[
            'id'=>'Product_1',
            'product'=>'Product 1'
        ];
        $product[]=[
            'id'=>'Product_2',
            'product'=>'Product 2'
        ];
        $product[]=[
            'id'=>'Product_3',
            'product'=>'Product 3'
        ];
        foreach($product as $pr)
        {
            App\Product::create($pr);
        }
    }
}
