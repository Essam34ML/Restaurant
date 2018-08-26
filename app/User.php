<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \TCG\Voyager\Models\User
{
  public function Order(){
    return $this->hasMany('App\Order');
  }
}
