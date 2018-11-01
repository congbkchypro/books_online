<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'customer';

  public function order(){
  return $this->hasMany('App\Order', 'id_customer', 'id');
}
}
