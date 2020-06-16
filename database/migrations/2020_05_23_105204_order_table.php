<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->unique();  //po_no primaryKey
            $table->primary('id');  
            $table->date('po_date');
            $table->string('po_status_id');
            $table->foreign('po_status_id')->references('id')->on('po_status');
            $table->text('origin_id');
            $table->text('marking');
            $table->text('manufacturer_id');
            $table->text('supplier_id');
            $table->text('pol');
            $table->text('pod');
            $table->text('incoterm_id');
            $table->date('eta_request');
            $table->text('end_customer');
            $table->boolean('inspection_required');
            $table->text('type_of_shipment');
            $table->text('link_to_specs')->nullable();
            $table->text('hs_code');
            $table->text('co_id');
            $table->text('payment_term_id');
            $table->text('within_x_day');
            $table->text('currency');
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
