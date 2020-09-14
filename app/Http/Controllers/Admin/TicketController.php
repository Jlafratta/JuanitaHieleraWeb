<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

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
    public function index(Request $request)
    {
        $clientId = $request->get('clientId');
        $date = $request->get('dateFilter');
        
        if($clientId != null && $clientId == 0){
            $tickets = Ticket::orderBy('id', 'DESC')
            ->where('client_name', 'LIKE', '%CONTADO%')
            ->date($date)
            ->paginate(10);
        }else{
            $tickets = Ticket::orderBy('id', 'DESC')
            ->client($clientId)
            ->date($date)
            ->paginate(10);
        }
        
        $clients = Client::getWithTickets();

        return view('dashboard.ticket.list')
        ->with(['title'=> TICKETS_TITLE,
                'tickets' => $tickets,
                'clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::orderBy('name', 'ASC')->get();
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
        $request->validate([
            'productId' => 'required',
            'bruto' => 'required',
            'tara' => 'required',
            'neto' => 'required',
        ]);

        $ticket = new Ticket();

        if($request->clientId == 0){
            $ticket->client_name = "CONTADO";
            $ticket->client_id = 0;
        }else{
            $ticket->client()->associate(Client::find($request->clientId));
            $ticket->client_name = $ticket->client->name;
            if($request->vehicleId){
                $ticket->patent = Vehicle::find($request->vehicleId)->patent;
            }
        }
        
        $ticket->date = Carbon::now()->toDateTimeString();
        $ticket->bruto = $request->bruto;
        $ticket->tara = $request->tara;
        $ticket->neto = $ticket->bruto - $ticket->tara;
        $ticket->prodPrice = Product::find($request->productId)->price;
        $ticket->total = $ticket->prodPrice * $ticket->neto;
        

        $ticket->save();
        $ticket->idCompound = "W-". $ticket->id;
        $ticket->save();

        
        return redirect('admin/tickets/create');       // AGREGAR IMPRESION ANTES
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'bruto' => ['required', 'integer'],
            'tara' => ['required', 'integer'],
            'neto' => ['required', 'integer'],
            'productId' => ['required', 'integer'],
        ]);
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Ticket  $ticket
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Ticket $ticket)
    // {
    //     //
    // }

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

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Ticket  $ticket
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Ticket $ticket)
    // {
    //     //
    // }

    public function sales()
    {
        return view('dashboard.sales.daily')->with(['title'=> DAILY_SALES_TITLE]);
    }
}
