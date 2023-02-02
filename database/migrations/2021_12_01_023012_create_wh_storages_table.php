<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhStoragesTable extends Migration
{
    public function up()
    {
        Schema::create('wh_storages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bin')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('wh_storages');
    }
}
