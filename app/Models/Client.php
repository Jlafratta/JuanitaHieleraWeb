<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function vehicles(){
        return $this->hasMany('App\Models\Vehicle');
    }
}
