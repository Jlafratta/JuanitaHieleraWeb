<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patent', 'tara', 'model', 'client_name', 'client_id',
    ];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
}
