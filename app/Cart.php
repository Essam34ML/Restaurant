<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{

    use SoftDeletes;

    use HasApiTokens;

    protected $fillable = [
          'total_price'
      ];

      public function Order(){
        return $this->hasMany('App\Order');
      }
}
