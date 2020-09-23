<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
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
    public function index(Request $request)
    {
        $clientId = $request->get('clientId');
        $patent = $request->get('patent');
        $clients = Client::all();
        $clientsFilter = Client::getWithVehicles();

        $vehicles = Vehicle::orderBy('id', 'DESC')
            ->client($clientId)
            ->patent($patent)
            ->paginate(10);

        return view('dashboard.vehicle.list')
        ->with(['title' => VEHICLES_TITLE,
                'vehicles' => $vehicles,
                'clients' => $clients,
                'clientsFilter' => $clientsFilter ]);
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
        $vehicle = new Vehicle();

        $vehicle->client()->associate(Client::find($request->clientId));

        $vehicle->patent = $request->patent;
        $vehicle->tara = $request->tara;
        $vehicle->model = $request->model;
        $vehicle->client_name = $vehicle->client->name;

        $vehicle->save();

        return redirect('admin/vehicles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('dashboard.vehicle.edit')
        ->with(['title' => VEHICLES_TITLE,
                'vehicle' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'patent'=>'required',
            'tara'=> 'required'
        ]);

        $vehicle->patent = $request->patent;
        $vehicle->tara = $request->tara;


        $vehicle->update();

        return redirect('admin/vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect('admin/vehicles');
    }


    public function byVehicleId(Request $request ,$id)
    {

        if($request->ajax()){

           $vehicleId=Vehicle::where('id' , $id)->get();
           return response()->json($vehicleId);
        }
        return null  ;
    }


    public function byClientId(Request $request ,$id)
    {

        if($request->ajax()){

           $vehiclesClientId=Vehicle::where('client_id',$id)->get();
           return response()->json($vehiclesClientId);
        }
        return null  ;
    }
}
