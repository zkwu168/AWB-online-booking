<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalServiceProvidersTable extends Migration
{
    public function up()
    {
        Schema::create('local_service_providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('pu_agent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
