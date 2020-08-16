<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentLocal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_locals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('po_no_id');
            $table->foreign('po_no_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('sub_po_no_id');
            $table->foreign('sub_po_no_id')->references('id')->on('shipments')->onDelete('cascade');
            $table->date('po_date');
            $table->text('type_of_service');
            $table->text('tax_level')->nullable();
            $table->string('item_name');
            $table->foreign('item_name')->references('id')->on('products')->onDelete('cascade');
            $table->text('item_origin');
            $table->decimal('qty',10,2);
            $table->decimal('unit_price',10,2);
            $table->string('incoterms_id');
            $table->foreign('incoterms_id')->references('id')->on('incoterms')->onDelete('cascade');
            $table->decimal('freight',10,2);
            $table->string('pol');
            $table->foreign('pol')->references('id')->on('pods')->onDelete('cascade');
            $table->text('ship');
            $table->integer('cont');
            $table->decimal('docs')->nullable();
            $table->decimal('dthc',10,2)->nullable();
            $table->decimal('cic',10,2)->nullable();
            $table->decimal('cleaning')->nullable();
            $table->decimal('other')->nullable();
            $table->date('bl_date');
            $table->date('eta');
            $table->decimal('amount');
            $table->date('due_date');
            $table->integer('week');
            $table->text('pr_no')->nullable();
            $table->date('pr_date')->nullable();
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
