<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Desktop;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return Ticket::all();
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
