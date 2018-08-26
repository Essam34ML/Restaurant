<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class OrderItem extends Model
{
  use SoftDeletes;

  use HasApiTokens;

  protected $fillable = [
        'quantity','price',
    ];



}
