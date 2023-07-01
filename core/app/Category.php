<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   public function service(){
       return $this->hasMany(Service::class);
   }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function servicePrice(){
        return $this->hasMany(ServicePrice::class);
    }
}
