<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'customer_id', 'id');
    }
}
