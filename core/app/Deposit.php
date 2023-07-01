<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    public function gateway(){
        return $this->belongsTo(Gateway::class, 'gateway_id', 'id');
    }
}
