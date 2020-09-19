<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idCompound', 'date', 'bruto', 'tara', 'neto', 'total', 'prodPrice', 'client_name', 'patent', 'client_id'
    ];

    public $timestamps = false;

    protected $dates = ['date'];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }


    public static function getCurrentMonthSales()
    {
        $month = Carbon::now()->month;
        return DB::select(DB::raw('select day(date(tickets.date)) as day, sum(total) as total
        FROM tickets 
        WHERE DATE(date)>"2020-'. $month .'-00" 
        AND DATE(date)<"2020-'. ($month+1) .'-01"  
        GROUP BY day;'));
    }

    public function scopeMonth($query, $month)
    {
        return $query->where('date', '>', '2020-01-31')->where('date', '<', '2021-01-01')->groupBy('date')->sum('total');
            // 'select DATE(date), sum(total) 
            // FROM tickets 
            // WHERE DATE(date)>"2020-08-00" 
            // AND DATE(date)<"2020-09-01" 
            // GROUP BY DATE(date);'
        
    }

    // Scope

    public function scopeClient($query, $clientId){
        if($clientId){
            return $query->where('client_id', $clientId);
        }
    }

    public function scopeDate($query, $date){
        if($date){
            return $query->where('date', 'LIKE', "%$date%");
        }
    }
    
}
