<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AciManifest;

class Truck extends Model
{
    protected $fillable = [
        'id', 'truckNumber', 'Terminal', 'VehicleType', 'LicensePlate', 'LicenseState',
    ];

    public function trucks() {
        return $this->hasMany(AciManifest::class);
    }
}
