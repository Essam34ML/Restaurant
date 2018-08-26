<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class Item extends Model
{
  use HasApiTokens;
  use SoftDeletes;

  protected $fillable = [
      'name','image','price','quantity',
  ];

  public function Category (){
    return $this->belongsTo('App\Category');
  }

  public function Order()
  {
    return $this->belongsToMany('App\Order' , 'order_item' , 'order_id' , 'item_id');
  }
}
