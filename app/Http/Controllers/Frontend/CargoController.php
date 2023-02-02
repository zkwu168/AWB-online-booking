<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCargoRequest;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Models\Cargo;
use App\Models\Shipment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CargoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cargo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cargos = Cargo::with(['shipment'])->get();

        return view('frontend.cargos.index', compact('cargos'));
    }

    public function create()
    {
        abort_if(Gate::denies('cargo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipments = Shipment::pluck('mailno', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.cargos.create', compact('shipments'));
    }

    public function store(StoreCargoRequest $request)
    {
        $cargo = Cargo::create($request->all());

        return redirect()->route('frontend.cargos.index');
    }

    public function edit(Cargo $cargo)
    {
        abort_if(Gate::denies('cargo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipments = Shipment::pluck('mailno', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cargo->load('shipment');

        return view('frontend.cargos.edit', compact('shipments', 'cargo'));
    }

    public function update(UpdateCargoRequest $request, Cargo $cargo)
    {
        $cargo->update($request->all());

        return redirect()->route('frontend.cargos.index');
    }

    public function show(Cargo $cargo)
    {
        abort_if(Gate::denies('cargo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cargo->load('shipment');

        return view('frontend.cargos.show', compact('cargo'));
    }

    public function destroy(Cargo $cargo)
    {
        abort_if(Gate::denies('cargo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cargo->delete();

        return back();
    }

    public function massDestroy(MassDestroyCargoRequest $request)
    {
        Cargo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
