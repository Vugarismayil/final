<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function category(){
      return $this->belongsTo(Category::class, 'category_id', 'id');
  }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
