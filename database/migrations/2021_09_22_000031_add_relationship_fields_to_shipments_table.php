<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShipmentsTable extends Migration
{
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->unsignedBigInteger('tracking_id')->nullable();
            $table->foreign('tracking_id', 'tracking_fk_4930649')->references('id')->on('shipment_trackings');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4453124')->references('id')->on('teams');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_4859318')->references('id')->on('shipment_statuses');
            $table->unsignedBigInteger('pickup_type_id')->nullable();
            $table->foreign('pickup_type_id', 'pickup_type_fk_4923344')->references('id')->on('shipment_pickup_types');
            $table->unsignedBigInteger('local_service_provider_id')->nullable();
            $table->foreign('local_service_provider_id', 'local_service_provider_fk_4930680')->references('id')->on('local_service_providers');
        });
    }
}
