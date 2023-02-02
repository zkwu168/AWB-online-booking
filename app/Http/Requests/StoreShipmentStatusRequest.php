<?php

namespace App\Http\Requests;

use App\Models\ShipmentStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShipmentStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_status_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:shipment_statuses',
            ],
            'detail' => [
                'string',
                'nullable',
            ],
            'color' => [
                'string',
                'max:7',
                'nullable',
            ],
            'active' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
