<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    public $timestamps = false;

    public function province(){
        return $this->belongsTo('App\Models\Province');
    }

    public function clients(){
        return $this->hasMany('App\Models\Client');
    }
}
