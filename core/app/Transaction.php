<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transections';
    protected $guarded = ['id'];
    public function gateway(){
        return $this->belongsTo(Gateway::class, 'gateway_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
