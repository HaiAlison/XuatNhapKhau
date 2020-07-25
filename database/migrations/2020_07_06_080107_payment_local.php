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
            $table->string('id');
            $table->string('po_no_id');
            $table->string('sub_po_no_id');
            $table->date('po_date');
            $table->text('type_of_service')->nullable();
            $table->text('tax_level')->nullable();
            $table->text('item_name');
            $table->text('item_origin');
            $table->decimal('qty',10,2);
            $table->decimal('unit_price',10,2);
            $table->text('incoterms_id');
            $table->decimal('freight',10,2);
            $table->text('pol')->nullable();
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
            $table->date('week');
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
