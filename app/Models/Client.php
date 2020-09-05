<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phoneline',
    ];

    public function vehicles(){
        return $this->hasMany('App\Models\Vehicle');
    }

    public function tickets(){
        return $this->hasMany('App\Models\Ticket');
    }
}
