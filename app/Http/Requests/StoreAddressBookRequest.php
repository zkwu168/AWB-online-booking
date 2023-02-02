<?php

namespace App\Http\Requests;

use App\Models\AddressBook;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddressBookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_book_create');
    }

    public function rules()
    {
        return [
            'company' => [
                'string',
                'nullable',
            ],
            'contact' => [
                'string',
                'nullable',
            ],
            'country' => [
                'string',
                'nullable',
            ],
            'province' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'county' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'post_code' => [
                'string',
                'nullable',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
        ];
    }
}
