<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TicketController extends Controller
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
        $tickets = Ticket::all();

        return view('dashboard.ticket.list')
        ->with(['title'=> TICKETS_TITLE,
                'tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $vehicles = Vehicle::all();
        $products = Product::all();
        return view('dashboard.ticket.new')
        ->with(['title'=> NEW_TICKET_TITLE,
                'clients' => $clients,
                'vehicles' => $vehicles,
                'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $ticket = new Ticket();
        $ticket->client()->associate(Client::find($request->clientId));

        $ticket->date = Carbon::now()->toDateTimeString();
        $ticket->bruto = $request->bruto;
        $ticket->tara = $request->tara;
        $ticket->neto = $ticket->bruto - $ticket->tara;
        $ticket->prodPrice = Product::find($request->productId)->price;
        $ticket->total = $ticket->prodPrice * $ticket->neto;
        $ticket->client_name = $ticket->client->name;
        $ticket->patent = Vehicle::find($request->vehicleId)->patent;
        $ticket->save();
        $ticket->idCompound = "W - ". $ticket->id;
        $ticket->save();

        
        return redirect('admin/tickets/create');       // AGREGAR IMPRESION ANTES
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    // public function edit(Ticket $ticket)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Ticket $ticket)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function sales()
    {
        return view('dashboard.sales.daily')->with(['title'=> DAILY_SALES_TITLE]);
    }
}
