<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShipmentDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        Schema::create('shipment_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->text('product_code_id');
            $table->text('product_name_id');
            $table->text('packing_id');
            $table->text('weight_unit_id');
            $table->text('binding_id');
            $table->decimal('net_weight_id',10,2);
            $table->decimal('price',10,2);
            $table->decimal('total_amount');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
