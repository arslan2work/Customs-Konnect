<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AceManifest extends Model
{
    protected $fillable = [
        'id', 'tripNumber', 'portOfEntry', 'subLocation', 'truck', 'trailer', 'driver', 'company_id', 'review', 'quantity', 'weight', 'statusAce'
    ];
}
