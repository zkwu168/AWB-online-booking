<?php

namespace App\Http\Requests;

use App\Models\Shipment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShipmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_create');
    }

    public function rules()
    {
        return [
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
            'oneself_pickup_flg' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
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
            'meterageweightqty' => [
                'numeric',
            ],
            'currency' => [
                'string',
                'max:5',
                'required',
            ],
            'is_under_call' => [
                'string',
                'max:2',
                'nullable',
            ],
        ];
    }
}
