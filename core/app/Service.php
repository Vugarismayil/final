<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function servicePrice(){
        return $this->hasMany(ServicePrice::class);
    }
}
