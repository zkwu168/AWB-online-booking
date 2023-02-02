<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_create');
    }

    public function rules()
    {
        return [
            'payment_method' => [
                'string',
                'nullable',
            ],
            'payment_details' => [
                'string',
                'nullable',
            ],
            'payment_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'transaction' => [
                'string',
                'nullable',
            ],
            'refund_note' => [
                'string',
                'nullable',
            ],
            'pay_by_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
