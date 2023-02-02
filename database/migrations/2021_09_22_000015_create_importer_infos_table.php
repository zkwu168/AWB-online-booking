<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImporterInfosTable extends Migration
{
    public function up()
    {
        Schema::create('importer_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vat')->nullable();
            $table->string('eori')->nullable();
            $table->string('importer_company_name')->nullable();
            $table->string('importer_tel_no')->nullable();
            $table->string('importer_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
