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
        Schema::create('type_of_shipment_detail', function (Blueprint $table) {
                $table->increments('id');
                $table->text('number_container');
                $table->text('container_size_id');
                $table->text('payload');
                $table->text('freight_target');
                $table->text('dthc_target');
                $table->text('cic_target');
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
