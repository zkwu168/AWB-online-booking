<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference_no_1')->nullable();
            $table->string('reference_no_2')->nullable();
            $table->string('mailno')->nullable();
            $table->integer('is_gen_bill_no')->nullable();
            $table->string('j_custid')->nullable();
            $table->string('j_email')->nullable();
            $table->string('j_company')->nullable();
            $table->string('j_contact')->nullable();
            $table->string('j_tel')->nullable();
            $table->string('j_mobile')->nullable();
            $table->string('j_area_code')->nullable();
            $table->string('j_country');
            $table->string('j_province');
            $table->string('j_city');
            $table->string('j_county')->nullable();
            $table->string('j_address')->nullable();
            $table->string('j_post_code');
            $table->string('d_custid')->nullable();
            $table->string('d_email')->nullable();
            $table->string('d_company')->nullable();
            $table->string('d_contact');
            $table->string('d_contact_cn')->nullable();
            $table->string('d_tel');
            $table->string('d_mobile')->nullable();
            $table->string('d_area_code')->nullable();
            $table->string('d_country');
            $table->string('d_province');
            $table->string('d_city');
            $table->string('d_county')->nullable();
            $table->string('d_address');
            $table->string('d_post_code');
            $table->string('tax_pay_type')->nullable();
            $table->string('ddp_remark')->nullable();
            $table->float('cargo_length', 10, 3)->nullable();
            $table->float('cargo_width', 10, 3)->nullable();
            $table->float('cargo_height', 10, 3)->nullable();
            $table->float('cargo_total_weight', 10, 3)->nullable();
            $table->integer('express_type')->nullable();
            $table->integer('parcel_quantity')->nullable();
            $table->string('tax_set_account')->nullable();
            $table->integer('oneself_pickup_flg')->nullable();
            $table->integer('pay_method')->nullable();
            $table->string('custid')->nullable();
            $table->string('thd_3_pay_area')->nullable();
            $table->string('trade_condition')->nullable();
            $table->integer('express_reason')->nullable();
            $table->string('express_reason_content')->nullable();
            $table->string('buss_remark')->nullable();
            $table->string('custom_batch')->nullable();
            $table->string('harmonized_code')->nullable();
            $table->string('aes_no')->nullable();
            $table->string('receiver_type')->nullable();
            $table->string('order_cert_type')->nullable();
            $table->string('order_cert_no')->nullable();
            $table->float('realweightqty', 10, 4)->nullable();
            $table->float('volumeweightqty', 10, 4)->nullable();
            $table->float('meterageweightqty', 10, 4)->nullable();
            $table->string('currency');
            $table->string('freight')->nullable();
            $table->string('buyers_nickname')->nullable();
            $table->string('tax')->nullable();
            $table->string('payment_tool')->nullable();
            $table->string('payment_number')->nullable();
            $table->datetime('payment_time')->nullable();
            $table->integer('print_size')->nullable();
            $table->float('turnover', 10, 4)->nullable();
            $table->float('dynamic_1', 10, 4)->nullable();
            $table->string('source_code')->nullable();
            $table->string('is_baggage')->nullable();
            $table->string('is_return')->nullable();
            $table->string('return_mailno')->nullable();
            $table->string('operate_type')->nullable();
            $table->string('sender_type')->nullable();
            $table->string('export_customer_type')->nullable();
            $table->string('is_under_call')->nullable();
            $table->string('import_customer_type')->nullable();
            $table->decimal('estimated_freight', 15, 2)->nullable();
            $table->decimal('actual_freight', 15, 2)->nullable();
            $table->decimal('paid_freight', 15, 2)->nullable();
            $table->decimal('outstanding_fee', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
