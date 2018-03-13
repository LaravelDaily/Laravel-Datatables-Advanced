<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'bank_acc_number',
        'customer_id',
        'company'
    ];
}
