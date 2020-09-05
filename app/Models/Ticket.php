<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $dates = ['date'];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
    
}
