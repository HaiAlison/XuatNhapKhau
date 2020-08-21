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
        Schema::create('shipment_details', function (Blueprint $table) {
            $table->id();  //đổi id thành po_no_id và thêm id làm khóa chính cho bảng detail.
            $table->string('po_no_id');
            $table->foreign('po_no_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('sub_po_no_id');
            $table->foreign('sub_po_no_id')->references('id')->on('shipments')->onDelete('cascade');
            $table->string('product_code_id');
            $table->foreign('product_code_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('packing_id');
            $table->foreign('packing_id')->references('id')->on('packings')->onDelete('cascade');
            $table->string('weight_unit_id');
            $table->foreign('weight_unit_id')->references('id')->on('weight_units')->onDelete('cascade');
            $table->string('binding_id');
            $table->foreign('binding_id')->references('id')->on('bindings')->onDelete('cascade');
            $table->decimal('net_weight',10,2); //chang net-weight-id to net-weight
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
