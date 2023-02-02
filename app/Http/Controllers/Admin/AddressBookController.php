<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddressBookRequest;
use App\Http\Requests\StoreAddressBookRequest;
use App\Http\Requests\UpdateAddressBookRequest;
use App\Models\AddressBook;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddressBookController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('address_book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AddressBook::with(['user', 'team'])->select(sprintf('%s.*', (new AddressBook())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'address_book_show';
                $editGate = 'address_book_edit';
                $deleteGate = 'address_book_delete';
                $crudRoutePart = 'address-books';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('company', function ($row) {
                return $row->company ? $row->company : '';
            });
            $table->editColumn('contact', function ($row) {
                return $row->contact ? $row->contact : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->editColumn('province', function ($row) {
                return $row->province ? $row->province : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('county', function ($row) {
                return $row->county ? $row->county : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('post_code', function ($row) {
                return $row->post_code ? $row->post_code : '';
            });
            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('is_shipper', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_shipper ? 'checked' : null) . '>';
            });
            $table->editColumn('is_receiver', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_receiver ? 'checked' : null) . '>';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_shipper', 'is_receiver', 'user']);

            return $table->make(true);
        }

        return view('admin.addressBooks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('address_book_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addressBooks.create', compact('users'));
    }

    public function store(StoreAddressBookRequest $request)
    {
        $addressBook = AddressBook::create($request->all());

        return redirect()->route('admin.address-books.index');
    }

    public function edit(AddressBook $addressBook)
    {
        abort_if(Gate::denies('address_book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addressBook->load('user', 'team');

        return view('admin.addressBooks.edit', compact('users', 'addressBook'));
    }

    public function update(UpdateAddressBookRequest $request, AddressBook $addressBook)
    {
        $addressBook->update($request->all());

        return redirect()->route('admin.address-books.index');
    }

    public function show(AddressBook $addressBook)
    {
        abort_if(Gate::denies('address_book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addressBook->load('user', 'team');

        return view('admin.addressBooks.show', compact('addressBook'));
    }

    public function destroy(AddressBook $addressBook)
    {
        abort_if(Gate::denies('address_book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addressBook->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddressBookRequest $request)
    {
        AddressBook::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
