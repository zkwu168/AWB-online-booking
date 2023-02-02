<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Http\Resources\Admin\CargoResource;
use App\Models\Cargo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CargoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cargo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CargoResource(Cargo::with(['shipment'])->get());
    }

    public function store(StoreCargoRequest $request)
    {
        $cargo = Cargo::create($request->all());

        return (new CargoResource($cargo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cargo $cargo)
    {
        abort_if(Gate::denies('cargo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CargoResource($cargo->load(['shipment']));
    }

    public function update(UpdateCargoRequest $request, Cargo $cargo)
    {
        $cargo->update($request->all());

        return (new CargoResource($cargo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cargo $cargo)
    {
        abort_if(Gate::denies('cargo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cargo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
