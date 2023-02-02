<?php

namespace App\Http\Requests;

use App\Models\ShipmentPickupType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShipmentPickupTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_pickup_type_create');
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
