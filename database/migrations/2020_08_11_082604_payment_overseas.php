<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentOverseas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_overseas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('po_no_id');
            $table->foreign('po_no_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('sub_po_no_id');
            $table->foreign('sub_po_no_id')->references('id')->on('shipments')->onDelete('cascade');
            $table->date('po_date');
            $table->string('item_name');
            $table->foreign('item_name')->references('id')->on('products')->onDelete('cascade');
            $table->string('item_packing');
            $table->foreign('item_packing')->references('id')->on('packings')->onDelete('cascade');
            $table->string('item_source');
            $table->foreign('item_source')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->string('item_origin');
            $table->foreign('item_origin')->references('id')->on('origins')->onDelete('cascade');
            $table->integer('qty');
            $table->decimal('unit_price',10,2);
            $table->string('incoterms');
            $table->foreign('incoterms')->references('id')->on('incoterms')->onDelete('cascade');
            $table->date('payment_term');
            $table->string('invoicing_party');
            $table->string('pol');
            $table->foreign('pol')->references('id')->on('pods')->onDelete('cascade');
            $table->string('ship');
            $table->integer('cont');
            $table->integer('freight');
            $table->date('bl_date');
            $table->date('eta');
            $table->decimal('total_amount',10,2);
            $table->date('due_date');
            $table->integer('week');
            $table->string('pr_no');
            $table->date('pr_date');
            $table->decimal('total_payment',10,2);
            $table->date('first_payment_date');
            $table->decimal('first_payment_amount',10,2);
            $table->date('second_payment_date')->nullable();
            $table->decimal('second_payment_amount',10,2)->nullable();
            $table->date('third_payment_date')->nullable();
            $table->decimal('third_payment_amount',10,2)->nullable();
            $table->date('fourth_payment_date')->nullable();
            $table->decimal('fourth_payment_amount',10,2)->nullable();
            $table->date('fifth_payment_date')->nullable();
            $table->decimal('fifth_payment_amount',10,2)->nullable();
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
