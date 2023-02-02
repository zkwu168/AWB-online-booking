<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_details')->nullable();
            $table->datetime('payment_date')->nullable();
            $table->string('transaction')->nullable();
            $table->decimal('refund_amount', 15, 2)->nullable();
            $table->string('refund_note')->nullable();
            $table->string('pay_by_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
