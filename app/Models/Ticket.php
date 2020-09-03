<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function client(){
        return $this->hasOne('App\Models\Client');
    }

    public function vehicle(){
        return $this->hasOne('App\Models\Vehicle');
    }
}
