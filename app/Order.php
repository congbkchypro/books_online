<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'order';

  public function order_detail(){
  	return $this->hasMany('App\OrderDetail', 'id_order', 'id');
  }

  public function customer(){
  	return $this->belongsTo('App\Customer', 'id_customer', 'id');
  }
}
