<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
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
