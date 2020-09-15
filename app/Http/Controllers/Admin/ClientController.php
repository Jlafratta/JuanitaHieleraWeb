<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'DESC')->where('debtor', 0)->paginate(10);
        $debtors = Client::orderBy('id', 'DESC')->where('debtor', 1)->paginate(10);
        //$provinces= Province::all();

        return view('dashboard.client.list')
        ->with(['title' => CLIENTS_TITLE, 
                'clients' => $clients,
                'debtors' => $debtors]);
                ///Agregar Pronvinces

                //agregar en el blade de List que no me deja sin que rompa lo siguiente
                /*
                 <!-- @foreach ($provinces as $province)
                                        <option value="{{ $province->id}}">{{ $province->name }}</option>
                                     @endforeach -->
                */

    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Client::create([
            'name' => $request->name,
            'address' => $request->address,
            'phoneline' => $request->phoneline
        ]);

        return redirect('admin/clients');  // retorno redirect, no view xq sino hace reenvio de formulario al refrescar
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('dashboard.client.edit')
        ->with(['title' => CLIENTS_TITLE,
                'client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'=>'required',
            'phoneline'=> 'required',
            'address' => 'required',
            'debt' => 'required'
        ]);

        $client->name = $request->name;
        $client->phoneline = $request->phoneline;
        $client->address = $request->address;
        $client->debtor = $request->debt;
        $client->update();

        return redirect('admin/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //$client->tickets()->detach(); //desasocio la fk
        $client->delete();
        return redirect('admin/clients');
    }
}
