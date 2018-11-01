<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  protected $table = 'order_detail';

  public function product(){
  	return $this->belongsTo('App\Product', 'id_product', 'id');
  }

  public function order(){
  	return $this->belongsTo('App\Order', 'id_order', 'id');
  }
}
