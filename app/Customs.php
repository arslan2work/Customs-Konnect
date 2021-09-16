<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customs extends Model
{
    protected $fillable = [
        'id', 'tripNumber', 'portOfEntry', 'query', 'review', 'terminal', 'status', 'time'
    ];
}
