<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->string('id');
            $table->text('product_code_id');
            $table->text('packing_id');
            $table->text('weight_unit_id');
            $table->text('binding_id');
            $table->decimal('net_weight_id',10,2);
            $table->decimal('price',10,2);
            $table->decimal('total_amount')->nullable(); //null to test 
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
