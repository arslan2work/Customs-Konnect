<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InBond extends Model
{
    protected $fillable = [
        'id', 'entryNumber', 'bill', 'warning', 'type', 'company_id', 'review', 'statusBond'
    ];
}
