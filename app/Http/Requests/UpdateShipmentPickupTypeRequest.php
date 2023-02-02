<?php

namespace App\Http\Requests;

use App\Models\ShipmentPickupType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipmentPickupTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_pickup_type_edit');
    }

    public function rules()
    {
        return [
            'service_name' => [
                'string',
                'max:30',
                'nullable',
            ],
        ];
    }
}
