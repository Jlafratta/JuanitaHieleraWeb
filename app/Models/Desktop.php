<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desktop extends Model
{
    protected $fillable = [
        'id', 'api_key',
    ];
    
    public $timestamps = false;
}
