<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyImporterInfoRequest;
use App\Http\Requests\StoreImporterInfoRequest;
use App\Http\Requests\UpdateImporterInfoRequest;
use App\Models\ImporterInfo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImporterInfoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('importer_info_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importerInfos = ImporterInfo::all();

        return view('frontend.importerInfos.index', compact('importerInfos'));
    }

    public function create()
    {
        abort_if(Gate::denies('importer_info_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.importerInfos.create');
    }

    public function store(StoreImporterInfoRequest $request)
    {
        $importerInfo = ImporterInfo::create($request->all());

        return redirect()->route('frontend.importer-infos.index');
    }

    public function edit(ImporterInfo $importerInfo)
    {
        abort_if(Gate::denies('importer_info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.importerInfos.edit', compact('importerInfo'));
    }

    public function update(UpdateImporterInfoRequest $request, ImporterInfo $importerInfo)
    {
        $importerInfo->update($request->all());

        return redirect()->route('frontend.importer-infos.index');
    }

    public function show(ImporterInfo $importerInfo)
    {
        abort_if(Gate::denies('importer_info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.importerInfos.show', compact('importerInfo'));
    }

    public function destroy(ImporterInfo $importerInfo)
    {
        abort_if(Gate::denies('importer_info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importerInfo->delete();

        return back();
    }

    public function massDestroy(MassDestroyImporterInfoRequest $request)
    {
        ImporterInfo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
