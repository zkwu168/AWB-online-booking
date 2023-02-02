<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentTrackingsTable extends Migration
{
    public function up()
    {
        Schema::create('shipment_trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sf_awb_url')->nullable();
            $table->longText('international_route')->nullable();
            $table->longText('local_route')->nullable();
            $table->longText('api_request')->nullable();
            $table->longText('api_response')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
