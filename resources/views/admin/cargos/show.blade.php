@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cargo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cargos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.id') }}
                        </th>
                        <td>
                            {{ $cargo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.name') }}
                        </th>
                        <td>
                            {{ $cargo->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.count') }}
                        </th>
                        <td>
                            {{ $cargo->count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.unit') }}
                        </th>
                        <td>
                            {{ $cargo->unit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.amount') }}
                        </th>
                        <td>
                            {{ $cargo->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.weight') }}
                        </th>
                        <td>
                            {{ $cargo->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.total_value') }}
                        </th>
                        <td>
                            {{ $cargo->total_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.currency') }}
                        </th>
                        <td>
                            {{ $cargo->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.source_area') }}
                        </th>
                        <td>
                            {{ $cargo->source_area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.product_record_no') }}
                        </th>
                        <td>
                            {{ $cargo->product_record_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.brand') }}
                        </th>
                        <td>
                            {{ $cargo->brand }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.statebarcode') }}
                        </th>
                        <td>
                            {{ $cargo->statebarcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.specifications') }}
                        </th>
                        <td>
                            {{ $cargo->specifications }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.goods_code') }}
                        </th>
                        <td>
                            {{ $cargo->goods_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.good_prepard_no') }}
                        </th>
                        <td>
                            {{ $cargo->good_prepard_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.hs_code') }}
                        </th>
                        <td>
                            {{ $cargo->hs_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.hts_code') }}
                        </th>
                        <td>
                            {{ $cargo->hts_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.hts_desc') }}
                        </th>
                        <td>
                            {{ $cargo->hts_desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.item_no') }}
                        </th>
                        <td>
                            {{ $cargo->item_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.qty_1') }}
                        </th>
                        <td>
                            {{ $cargo->qty_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.unit_1') }}
                        </th>
                        <td>
                            {{ $cargo->unit_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cargo.fields.shipment') }}
                        </th>
                        <td>
                            {{ $cargo->shipment->mailno ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cargos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection