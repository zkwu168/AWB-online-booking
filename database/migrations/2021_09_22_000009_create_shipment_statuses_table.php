<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('shipment_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('detail')->nullable();
            $table->string('color')->nullable();
            $table->integer('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
