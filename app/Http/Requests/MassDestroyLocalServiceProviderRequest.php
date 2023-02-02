<?php

namespace App\Http\Requests;

use App\Models\LocalServiceProvider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLocalServiceProviderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('local_service_provider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:local_service_providers,id',
        ];
    }
}
