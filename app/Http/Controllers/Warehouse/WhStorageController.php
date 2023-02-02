<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWhStorageRequest;
use App\Http\Requests\StoreWhStorageRequest;
use App\Http\Requests\UpdateWhStorageRequest;
use App\Models\Warehouse;
use App\Models\WhStorage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WhStorageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wh_storage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whStorages = WhStorage::with(['warehouse'])->get();

        return view('warehouse.whStorages.index', compact('whStorages'));
    }

    public function create()
    {
        abort_if(Gate::denies('wh_storage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $warehouses = Warehouse::pluck('network_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('warehouse.whStorages.create', compact('warehouses'));
    }

    public function store(StoreWhStorageRequest $request)
    {
        $whStorage = WhStorage::create($request->all());

        return redirect()->route('warehouse.wh-storages.index');
    }

    public function edit(WhStorage $whStorage)
    {
        abort_if(Gate::denies('wh_storage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $warehouses = Warehouse::pluck('network_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $whStorage->load('warehouse');

        return view('warehouse.whStorages.edit', compact('warehouses', 'whStorage'));
    }

    public function update(UpdateWhStorageRequest $request, WhStorage $whStorage)
    {
        $whStorage->update($request->all());

        return redirect()->route('warehouse.wh-storages.index');
    }

    public function show(WhStorage $whStorage)
    {
        abort_if(Gate::denies('wh_storage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whStorage->load('warehouse');

        return view('warehouse.whStorages.show', compact('whStorage'));
    }

    public function destroy(WhStorage $whStorage)
    {
        abort_if(Gate::denies('wh_storage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whStorage->delete();

        return back();
    }

    public function massDestroy(MassDestroyWhStorageRequest $request)
    {
        WhStorage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}