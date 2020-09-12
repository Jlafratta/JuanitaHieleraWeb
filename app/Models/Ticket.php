<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
