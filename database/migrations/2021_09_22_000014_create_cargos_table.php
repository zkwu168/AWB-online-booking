<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('count');
            $table->string('unit');
            $table->float('amount', 10, 4);
            $table->float('weight', 10, 4)->nullable();
            $table->float('total_value', 10, 4)->nullable();
            $table->string('currency')->nullable();
            $table->string('source_area');
            $table->string('product_record_no')->nullable();
            $table->string('brand')->nullable();
            $table->string('statebarcode')->nullable();
            $table->string('specifications')->nullable();
            $table->string('goods_code')->nullable();
            $table->string('good_prepard_no')->nullable();
            $table->string('hs_code')->nullable();
            $table->string('hts_code')->nullable();
            $table->string('hts_desc')->nullable();
            $table->integer('item_no')->nullable();
            $table->float('qty_1', 19, 5)->nullable();
            $table->string('unit_1')->nullable();
            $table->float('qty_2', 19, 5)->nullable();
            $table->string('unit_2')->nullable();
            $table->string('good_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
