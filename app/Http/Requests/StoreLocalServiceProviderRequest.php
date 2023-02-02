<?php

namespace App\Http\Requests;

use App\Models\LocalServiceProvider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLocalServiceProviderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('local_service_provider_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'pu_agent' => [
                'string',
                'nullable',
            ],
        ];
    }
}
