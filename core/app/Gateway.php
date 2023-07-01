<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
   protected $guarded = ['id'];

   public function deposit(){
       return $this->hasMany(Deposit::class);
   }

    public function transaction(){
        return $this->hasMany(Deposit::class);
    }

    public function withdraw(){
        return $this->hasMany(Withdraw::class);
    }
}
