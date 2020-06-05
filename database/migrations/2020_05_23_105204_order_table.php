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
            $table->string('id');  //po_no primaryKey
            $table->date('po_date');
            $table->text('po_status_id');
            $table->text('origin_id');
            $table->text('marking');
            $table->text('manufacture_id');
            $table->text('supplier_id');
            $table->text('pol');
            $table->text('pod');
            $table->text('incoterms_id');
            $table->date('eta_request');
            $table->text('end_customer');
            $table->boolean('inspection_required');
            $table->text('type_of_shipment');
            $table->text('link_to_specs');
            $table->text('hs_code');
            $table->text('co_id');
            $table->text('payment_terms_id');
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
