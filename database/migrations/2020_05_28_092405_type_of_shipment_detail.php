<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TypeOfShipmentDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_shipment_details', function (Blueprint $table) {
                $table->string('id');
                $table->decimal('number_container',10,0);
                $table->string('container_size_id');
                $table->foreign('container_size_id')->references('id')->on('container_sizes')->onDelete('cascade');
                $table->decimal('payload',10,2);
                $table->decimal('freight_target',10,2);
                $table->decimal('dthc_target',10,2);
                $table->decimal('cic_target',10,2);
                $table->timestamps();
                $table->softDeletes();
            });    }

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
