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
                $table->text('number_container');
                $table->text('container_size_id');
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
