<?php

namespace App\Http\Requests;

use App\Models\Cargo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCargoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cargo_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:128',
                'required',
            ],
            'count' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'unit' => [
                'string',
                'max:30',
                'required',
            ],
            'amount' => [
                'numeric',
                'required',
            ],
            'weight' => [
                'numeric',
            ],
            'total_value' => [
                'numeric',
            ],
            'currency' => [
                'string',
                'max:5',
                'nullable',
            ],
            'source_area' => [
                'string',
                'max:5',
                'required',
            ],
            'product_record_no' => [
                'string',
                'max:18',
                'nullable',
            ],
            'brand' => [
                'string',
                'max:60',
                'nullable',
            ],
            'statebarcode' => [
                'string',
                'max:50',
                'nullable',
            ],
            'specifications' => [
                'string',
                'max:600',
                'nullable',
            ],
            'goods_code' => [
                'string',
                'max:60',
                'nullable',
            ],
            'good_prepard_no' => [
                'string',
                'max:100',
                'nullable',
            ],
            'hts_code' => [
                'string',
                'max:100',
                'nullable',
            ],
            'hts_desc' => [
                'string',
                'max:200',
                'nullable',
            ],
            'item_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'qty_1' => [
                'numeric',
            ],
            'unit_1' => [
                'string',
                'max:30',
                'nullable',
            ],
        ];
    }
}
