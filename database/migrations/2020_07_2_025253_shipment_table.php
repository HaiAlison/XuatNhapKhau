<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('shipments', function (Blueprint $table) {
            $table->string('id')->unique(); //sub_po_no primaryKey            
            $table->primary('id');
            $table->string('po_no_id');
            $table->foreign('po_no_id')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('sale_contract_no');
            $table->text('invoice_no');
            $table->text('bl_no');
            $table->date('bl_date');
            $table->date('eta');
            $table->text('vessel_name');
            $table->text('carrier');
            $table->string('shipment_status_id');
            $table->foreign('shipment_status_id')->references('id')->on('shipment_status')->onDelete('cascade');
            $table->string('incoterms_id');
            $table->foreign('incoterms_id')->references('id')->on('incoterms')->onDelete('cascade');
            $table->text('pod');
            $table->text('type_of_shipment');
            $table->decimal('number_container',10,0);
            $table->string('container_size');
            $table->foreign('container_size')->references('id')->on('container_sizes')->onDelete('cascade');
            $table->decimal('payload',10,2);
            $table->text('dem_det');
            $table->decimal('freight_per_container',10,2);
            $table->text('dthc'); //save with json type
            $table->text('cic'); //save with json type
            $table->text('freight_per_mt');
            $table->text('number_of_bags');
            $table->text('gross_weight');
            $table->boolean('co_provider');
            $table->integer('currency'); //default USD to VND
            $table->timestamps();
            $table->softDeletes(); 
            
            //
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
