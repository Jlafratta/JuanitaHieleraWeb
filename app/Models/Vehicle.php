<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vehicle extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patent', 'tara', 'model', 'client_name',
    ];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    // Scope

    public function scopeClient($query, $clientId){
        if($clientId){
            return $query->where('client_id', $clientId);
        }
    }

    public function scopePatent($query, $patent){
        if($patent){
            return $query->where('patent', 'LIKE', "$patent%");
        }
    }
}
