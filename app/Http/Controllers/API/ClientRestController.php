<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Vehicle;
use App\Models\Desktop;
use Illuminate\Http\Request;

class ClientRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $dsktp = Desktop::find(1);
        if($request->header('auth') == $dsktp->api_key){

            $clients = Client::all();
            $vehicles = Vehicle::all();
            $arrClients = array();
            foreach($clients as $client){
                array_push($arrClients, $client);
                $vehicleList = array();
                
                foreach($vehicles as $vehicle){
                    if($vehicle->client_id == $client->id){
                        array_push($vehicleList, $vehicle);
                    }
                }
                $client->vehicleList = $vehicleList;
                $vehicleList = array();
            }
            return empty($arrClients) ? response()->json($arrClients, 204) : response()->json($arrClients, 200);
        }
        return response('', 401);
    }

}
