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
            $table->engine = 'InnoDB';
            $table->string('id')->unique();  //po_no primaryKey
            $table->primary('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('po_date');
            $table->string('po_status_id');
            $table->foreign('po_status_id')->references('id')->on('po_status')->onDelete('cascade');
            $table->string('origin_id');
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->text('marking');
            $table->string('manufacturer_id');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->string('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('pol');
            $table->foreign('pol')->references('id')->on('pods')->onDelete('cascade');
            $table->string('pod');
            $table->foreign('pod')->references('id')->on('pods')->onDelete('cascade');
            $table->string('incoterm_id');
            $table->foreign('incoterm_id')->references('id')->on('incoterms')->onDelete('cascade');
            $table->date('eta_request');
            $table->text('end_customer');
            $table->boolean('inspection_required');
            $table->text('type_of_shipment');
            $table->text('link_to_specs')->nullable();
            $table->text('hs_code');
            $table->text('co_id');
            $table->string('payment_term_id');
            $table->foreign('payment_term_id')->references('id')->on('payment_terms')->onDelete('cascade');
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
