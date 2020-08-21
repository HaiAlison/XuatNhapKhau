<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfShipmentDetailShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_shipment_detail_shipments', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('po_no_id');
            $table->foreign('po_no_id')->references('id')->on('orders')->onDelete('cascade');
            $table->decimal('number_container',10,0);
            $table->string('container_size');
            $table->foreign('container_size')->references('id')->on('container_sizes')->onDelete('cascade');
            $table->decimal('payload',10,2);
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
        Schema::dropIfExists('type_of_shipment_detail_shipments');
    }
}
