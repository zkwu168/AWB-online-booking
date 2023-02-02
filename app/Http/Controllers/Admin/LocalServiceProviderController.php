<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLocalServiceProviderRequest;
use App\Http\Requests\StoreLocalServiceProviderRequest;
use App\Http\Requests\UpdateLocalServiceProviderRequest;
use App\Models\LocalServiceProvider;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalServiceProviderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('local_service_provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localServiceProviders = LocalServiceProvider::all();

        return view('admin.localServiceProviders.index', compact('localServiceProviders'));
    }

    public function create()
    {
        abort_if(Gate::denies('local_service_provider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.localServiceProviders.create');
    }

    public function store(StoreLocalServiceProviderRequest $request)
    {
        $localServiceProvider = LocalServiceProvider::create($request->all());

        return redirect()->route('admin.local-service-providers.index');
    }

    public function edit(LocalServiceProvider $localServiceProvider)
    {
        abort_if(Gate::denies('local_service_provider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.localServiceProviders.edit', compact('localServiceProvider'));
    }

    public function update(UpdateLocalServiceProviderRequest $request, LocalServiceProvider $localServiceProvider)
    {
        $localServiceProvider->update($request->all());

        return redirect()->route('admin.local-service-providers.index');
    }

    public function show(LocalServiceProvider $localServiceProvider)
    {
        abort_if(Gate::denies('local_service_provider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localServiceProvider->load('localServiceProviderShipments');

        return view('admin.localServiceProviders.show', compact('localServiceProvider'));
    }

    public function destroy(LocalServiceProvider $localServiceProvider)
    {
        abort_if(Gate::denies('local_service_provider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localServiceProvider->delete();

        return back();
    }

    public function massDestroy(MassDestroyLocalServiceProviderRequest $request)
    {
        LocalServiceProvider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
