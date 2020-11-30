<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Desktop;
use Illuminate\Http\Request;

class VehicleRestController extends Controller
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
            $vehicles = Vehicle::all();
            return $vehicles->isEmpty() ? response()->json($vehicles, 204) : response()->json($vehicles, 200);
        }
        return response('', 401);
    }

}
