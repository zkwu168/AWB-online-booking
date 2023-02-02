<?php

namespace App\Http\Requests;

use App\Models\Shipment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_edit');
    }

    public function rules()
    {
        return [
            'reference_no_1' => [
                'string',
                'max:64',
                'nullable',
            ],
            'mailno' => [
                'string',
                'max:4000',
                'nullable',
            ],
            'is_gen_bill_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'j_email' => [
                'string',
                'max:50',
                'nullable',
            ],
            'j_company' => [
                'string',
                'max:100',
                'nullable',
            ],
            'j_contact' => [
                'string',
                'max:100',
                'nullable',
            ],
            'j_tel' => [
                'string',
                'max:20',
                'nullable',
            ],
            'j_mobile' => [
                'string',
                'max:20',
                'nullable',
            ],
            'j_area_code' => [
                'string',
                'max:25',
                'nullable',
            ],
            'j_country' => [
                'string',
                'max:30',
                'required',
            ],
            'j_province' => [
                'string',
                'max:30',
                'required',
            ],
            'j_city' => [
                'string',
                'max:100',
                'required',
            ],
            'j_county' => [
                'string',
                'max:30',
                'nullable',
            ],
            'j_address' => [
                'string',
                'max:200',
                'nullable',
            ],
            'j_post_code' => [
                'string',
                'required',
            ],
            'd_custid' => [
                'string',
                'max:40',
                'nullable',
            ],
            'd_email' => [
                'string',
                'max:50',
                'nullable',
            ],
            'd_company' => [
                'string',
                'max:100',
                'nullable',
            ],
            'd_contact' => [
                'string',
                'max:100',
                'required',
            ],
            'd_contact_cn' => [
                'string',
                'max:100',
                'nullable',
            ],
            'd_tel' => [
                'string',
                'max:100',
                'required',
            ],
            'd_mobile' => [
                'string',
                'max:20',
                'nullable',
            ],
            'd_area_code' => [
                'string',
                'max:20',
                'nullable',
            ],
            'd_country' => [
                'string',
                'max:30',
                'required',
            ],
            'd_province' => [
                'string',
                'max:30',
                'required',
            ],
            'd_city' => [
                'string',
                'max:100',
                'required',
            ],
            'd_county' => [
                'string',
                'max:30',
                'nullable',
            ],
            'd_address' => [
                'string',
                'max:200',
                'required',
            ],
            'd_post_code' => [
                'string',
                'max:20',
                'required',
            ],
            'ddp_remark' => [
                'string',
                'max:100',
                'nullable',
            ],
            'cargo_length' => [
                'numeric',
            ],
            'cargo_width' => [
                'numeric',
            ],
            'cargo_height' => [
                'numeric',
            ],
            'cargo_total_weight' => [
                'numeric',
            ],
            'express_type' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'parcel_quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'oneself_pickup_flg' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pay_method' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'custid' => [
                'string',
                'max:40',
                'nullable',
            ],
            'thd_3_pay_area' => [
                'string',
                'max:256',
                'nullable',
            ],
            'trade_condition' => [
                'string',
                'max:30',
                'nullable',
            ],
            'express_reason' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'express_reason_content' => [
                'string',
                'max:256',
                'nullable',
            ],
            'buss_remark' => [
                'string',
                'max:256',
                'nullable',
            ],
            'custom_batch' => [
                'string',
                'max:20',
                'nullable',
            ],
            'harmonized_code' => [
                'string',
                'max:100',
                'nullable',
            ],
            'aes_no' => [
                'string',
                'max:100',
                'nullable',
            ],
            'receiver_type' => [
                'string',
                'max:2',
                'nullable',
            ],
            'order_cert_no' => [
                'string',
                'max:100',
                'nullable',
            ],
            'realweightqty' => [
                'numeric',
            ],
            'volumeweightqty' => [
                'numeric',
            ],
            'meterageweightqty' => [
                'numeric',
            ],
            'currency' => [
                'string',
                'max:5',
                'required',
            ],
            'is_baggage' => [
                'string',
                'max:1',
                'nullable',
            ],
            'sender_type' => [
                'string',
                'max:2',
                'nullable',
            ],
            'export_customer_type' => [
                'string',
                'max:2',
                'nullable',
            ],
            'is_under_call' => [
                'string',
                'max:2',
                'nullable',
            ],
            'import_customer_type' => [
                'string',
                'max:2',
                'nullable',
            ],
        ];
    }
}
