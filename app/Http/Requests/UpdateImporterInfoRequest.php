<?php

namespace App\Http\Requests;

use App\Models\ImporterInfo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateImporterInfoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('importer_info_edit');
    }

    public function rules()
    {
        return [
            'vat' => [
                'string',
                'max:11',
                'nullable',
            ],
            'eori' => [
                'string',
                'max:18',
                'nullable',
            ],
            'importer_company_name' => [
                'string',
                'max:100',
                'nullable',
            ],
            'importer_tel_no' => [
                'string',
                'max:20',
                'nullable',
            ],
            'importer_address' => [
                'string',
                'max:200',
                'nullable',
            ],
        ];
    }
}
