<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class WebsiteMenu extends Model
{
  use SoftDeletes;

  use HasApiTokens;
  protected $fillable = [
      'name',
  ];

  public function Category(){
    return $this->hasMany('App\Category');
  }
}
