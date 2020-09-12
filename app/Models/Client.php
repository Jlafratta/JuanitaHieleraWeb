<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phoneline', 'debtor',
    ];

    public $timestamps = false;

    public function vehicles(){
        return $this->hasMany('App\Models\Vehicle');
    }

    public function tickets(){
        return $this->hasMany('App\Models\Ticket');
    }

    public static function getWithTickets (){
        return DB::table('clients')
            ->join('tickets', 'clients.id', '=', 'tickets.client_id')
            ->select('clients.id', 'clients.name')
            ->groupBy('clients.id', 'clients.name')
            ->get();
    }

    public static function getWithVehicles (){
        return DB::table('clients')
            ->join('vehicles', 'clients.id', '=', 'vehicles.client_id')
            ->select('clients.id', 'clients.name')
            ->groupBy('clients.id', 'clients.name')
            ->get();
    }

}
