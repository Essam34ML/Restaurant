<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
  use SoftDeletes;

  use HasApiTokens;
  protected $fillable = [
      'quantity',
  ];

    public function Item(){
      return $this->belongsToMany('App\Item' , 'order_item' , 'item_id' , 'order_id')->withPivot('quantity' , 'price');
    }

    public function User(){
      return $this->belongsTo('App\User');
    }


    public function Cart(){
      return $this->belongsTo('App\Cart');
    }
}
