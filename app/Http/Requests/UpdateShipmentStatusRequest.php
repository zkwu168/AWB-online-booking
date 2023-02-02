<?php

namespace App\Http\Requests;

use App\Models\ShipmentStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipmentStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_status_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:shipment_statuses,name,' . request()->route('shipment_status')->id,
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
