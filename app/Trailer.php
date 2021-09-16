<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    protected $fillable = [
        'id', 'trailerNumber', 'terminal', 'trailerType', 'licensePLate', 'LicenseState'
    ];

    public function trailers() {
        return $this->hasMany(AciManifest::class);
    }
}
