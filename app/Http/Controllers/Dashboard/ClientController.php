<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use App\City;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::when($request->search, function($q) use ($request){

            return $q->where('id_number', 'like', '%' . $request->search . '%');
            
        })->latest()->paginate(5);

        return view('dashboard.clients.index', compact('clients'));

 }//end of index
    public function show($id)
    {
        $client = Client::findOrFail($id);
        // return $users;
        return view('dashboard.clients.view', compact('client'));
    }

    public function create()
    {
        return view('dashboard.clients.create');

    }//end of create

    public function store(Request $request)
    {
      
            $rules = [

                'name' => 'required',
                'phone' => 'required|array|min:1',
                'ardy' => 'required|array|min:1',
                'ardy.0' => 'required',
               'phone.0' => 'required',
                'address' => 'required',
    
            ];
            $msg =  [
               
                'name.required' => 'اسم العميل',
                'phone.required' => 'الجوال2',
                'ardy.required' => 'الارضى2',
                'ardy.0.required' => 'الارضى1',
               'phone.0.required' => 'الجوال1',
                'address.required' => 'العنوان',
            ];
            $this->validate($request , $rules , $msg);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        Client::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of store

    public function edit(Client $client)
    {
        return view('dashboard.clients.edit', compact('client'));

    }//end of edit

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'ardy' => 'required',
            'phone.0' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);
       

        $client->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of update

    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of destroy

}//end of controller
