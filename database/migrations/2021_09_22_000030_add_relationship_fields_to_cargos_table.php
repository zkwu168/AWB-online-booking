<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCargosTable extends Migration
{
    public function up()
    {
        Schema::table('cargos', function (Blueprint $table) {
            $table->unsignedBigInteger('shipment_id')->nullable();
            $table->foreign('shipment_id', 'shipment_fk_4865664')->references('id')->on('shipments');
        });
    }
}
