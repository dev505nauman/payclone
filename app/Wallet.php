<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
   public function logs()
    {
        return $this->hasMany('App\WalletsLog');
    }
}
