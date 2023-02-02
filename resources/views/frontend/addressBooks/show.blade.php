@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.addressBook.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.address-books.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.company') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.contact') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->contact }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.country') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->country }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.province') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->province }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.county') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->county }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.post_code') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->post_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.is_shipper') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $addressBook->is_shipper ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.is_receiver') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $addressBook->is_receiver ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addressBook.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $addressBook->user->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.address-books.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection