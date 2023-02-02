<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddressBookRequest;
use App\Http\Requests\StoreAddressBookRequest;
use App\Http\Requests\UpdateAddressBookRequest;
use App\Models\AddressBook;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AddressBookController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('address_book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addressBooks = AddressBook::with(['user', 'team'])->get();

        return view('frontend.addressBooks.index', compact('addressBooks'));
    }

    public function create()
    {
        abort_if(Gate::denies('address_book_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.addressBooks.create', compact('users'));
    }

    public function store(StoreAddressBookRequest $request)
    {
        $addressBook = AddressBook::create($request->all());

        return redirect()->route('frontend.address-books.index');
    }

    public function edit(AddressBook $addressBook)
    {
        abort_if(Gate::denies('address_book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addressBook->load('user', 'team');

        return view('frontend.addressBooks.edit', compact('users', 'addressBook'));
    }

    public function update(UpdateAddressBookRequest $request, AddressBook $addressBook)
    {
        $addressBook->update($request->all());

        return redirect()->route('frontend.address-books.index');
    }

    public function show(AddressBook $addressBook)
    {
        abort_if(Gate::denies('address_book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addressBook->load('user', 'team');

        return view('frontend.addressBooks.show', compact('addressBook'));
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


    //  -     Ajax Call   -
    public function ajax_add_shipper(Request $request)
    {
        $data['user_id'] = Auth::user()->id;
        $data['company'] = $request->input('j_company');
        $data['contact'] = $request->input('j_contact');
        $data['country'] = $request->input('j_country');
        $data['province'] = $request->input('j_province');
        $data['city'] = $request->input('j_city');
        $data['county'] = $request->input('j_county');
        $data['address'] = $request->input('j_address');
        $data['post_code'] = $request->input('j_post_code');
        $data['mobile'] = $request->input('j_tel');
        $data['email'] = $request->input('j_email');
        $data['is_shipper'] = true;

        $data == AddressBook::create($data);
        return ['success' => true, 'data' => $request->input('j_contact')];
        
    }

    public function ajax_get_shipper()
    {

        $data = AddressBook::where('user_id','=',Auth::user()->id)->where('is_shipper','=',true)->where('country','=','GB')
        ->get(['id','company','contact','country','province','city','county','address','post_code','mobile','email']);
        return ['success' => true,'data' => $data];
        
    }

    public function ajax_add_receiver(Request $request)
    {
        $data['user_id'] = Auth::user()->id;
        $data['company'] = $request->input('d_company');
        $data['contact'] = $request->input('d_contact');
        $data['country'] = $request->input('d_country');
        $data['province'] = $request->input('d_province');
        $data['city'] = $request->input('d_city');
        $data['county'] = $request->input('d_county');
        $data['address'] = $request->input('d_address');
        $data['post_code'] = $request->input('d_post_code');
        $data['mobile'] = $request->input('d_tel');
        $data['email'] = $request->input('d_email');
        $data['is_receiver'] = true;

        $data == AddressBook::create($data);
        return ['success' => true, 'data' => $request->input('d_contact')];
        
    }

    public function ajax_get_receiver()
    {

        $data = AddressBook::where('user_id','=',Auth::user()->id)->where('is_receiver','=',true)
        ->get(['id','company','contact','country','province','city','county','address','post_code','mobile','email']);
        return ['success' => true,'data' => $data];
        
    }

    public function ajax_find_address(Request $request)
    {
        try{
   
        $results = get_address()->find($request->input('postcode'))->toArray();
        $data = '';
            foreach($results['addresses'] as $addressArray )
            {
                $data .="<tr class='clickable-row' data-addr='".json_encode($addressArray)."' style='cursor: pointer;'>";
                $data .= '<td>'.$addressArray['line_1'].'</td>';
                $data .= '<td>'.$addressArray['line_2'].'</td>';
                $data .= '<td>'.$addressArray['line_3'].'</td>';
                $data .= '<td>'.$addressArray['line_4'].'</td>';
                $data .= '<td>'.$addressArray['town_or_city'].'</td>';
                $data .= '<td>'.$addressArray['county'].'</td>';

                $data .='</tr>';
            }
            $formatedPostcode = $this->postcodeFormat($request->input('postcode'));
            return ['success' => true, 'data' => $data, 'formatedPostcode' => $formatedPostcode, 'addr_count' => count($results['addresses'])];
        
        }catch (Exception $e) 
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    //format postcode
    public function postcodeFormat($postcode)
    {
        //remove non alphanumeric characters
        $cleanPostcode = preg_replace("/[^A-Za-z0-9]/", '', $postcode);
    
        //make uppercase
        $cleanPostcode = strtoupper($cleanPostcode);
    
        //insert space
        $postcode = substr($cleanPostcode, 0, -3) . " " . substr($cleanPostcode, -3);
    
        return $postcode;
    }



}
