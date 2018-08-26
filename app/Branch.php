<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;



class Branch extends Model
{
  use SoftDeletes;

  use HasApiTokens;

  protected $fillable = [
      'title','city','street','phone_number','lat','lng'
  ];


}
