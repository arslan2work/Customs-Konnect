<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Truck;
use App\Trailer;
use App\Driver;

class AciManifest extends Model
{
    protected $fillable = [
        'id', 'tripNumber', 'portOfEntry', 'subLocation', 'truck', 'trailer', 'driver', 'company_id', 'review', 'weight' ,'quantity', 'status', 'shippers'
    ];

}
