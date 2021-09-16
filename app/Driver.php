<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'id', 'fullName', 'employeeNumber', 'gender', 'citizenship', 'documentNumber', 'type', 'state'
    ];

    public function drivers() {
        return $this->hasMany(AciManifest::class);
    }
}
