<?php

namespace App\Http\Requests;

use App\Models\ShipmentTracking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipmentTrackingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_tracking_edit');
    }

    public function rules()
    {
        return [
            'sf_awb_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
