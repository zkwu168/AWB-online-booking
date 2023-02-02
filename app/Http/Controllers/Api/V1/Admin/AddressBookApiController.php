<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressBookRequest;
use App\Http\Requests\UpdateAddressBookRequest;
use App\Http\Resources\Admin\AddressBookResource;
use App\Models\AddressBook;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressBookApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('address_book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddressBookResource(AddressBook::with(['user', 'team'])->get());
    }

    public function store(StoreAddressBookRequest $request)
    {
        $addressBook = AddressBook::create($request->all());

        return (new AddressBookResource($addressBook))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddressBook $addressBook)
    {
        abort_if(Gate::denies('address_book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddressBookResource($addressBook->load(['user', 'team']));
    }

    public function update(UpdateAddressBookRequest $request, AddressBook $addressBook)
    {
        $addressBook->update($request->all());

        return (new AddressBookResource($addressBook))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddressBook $addressBook)
    {
        abort_if(Gate::denies('address_book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addressBook->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
