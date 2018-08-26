<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
  use HasApiTokens;
  use SoftDeletes;

  protected $fillable = [
      'name','image',
  ];

  public function Menu(){
    return $this->belongsTo('App\WebsiteMenu');
  }

  public function Item(){
    return $this->hasMany('App\Item');
  }
}
