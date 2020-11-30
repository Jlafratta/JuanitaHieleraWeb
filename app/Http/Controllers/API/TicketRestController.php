<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Desktop;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketRestController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function store($ticket)
    {
        $tic = new Ticket();
        $tic->date = $ticket['date'];
        $tic->bruto = $ticket['bruto'];
        $tic->tara = $ticket['tara'];
        $tic->neto = $ticket['neto'];
        $tic->total = $ticket['total'];
        $tic->prodPrice = $ticket['prodPrice'];
        $tic->patent = $ticket['patent'];
        $tic->client_name = $ticket['client_name'];
        $tic->client_id = $ticket['client_id'];
        $tic->save();
        $tic->idCompound = 'E-'.$tic->id;
        $tic->save();

        return response()->json($ticket, 201);
    }

    public function addAll(Request $request)
    {
        $dsktp = Desktop::find(1);
        if($request->header('auth') == $dsktp->api_key){
            $tickets = $request->all();
            foreach($tickets as $ticket){
                $this->store($ticket);
            }
            return response()->json($request, 201);
        }
        return response('', 401);
    }

}
