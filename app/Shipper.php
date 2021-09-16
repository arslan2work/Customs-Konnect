<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $fillable = [
        'id', 'name', 'type', 'address', 'city', 'state'
    ];

    
}
