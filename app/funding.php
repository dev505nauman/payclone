<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class funding extends Model
{
    public function name(){
        return $this->belongsTo('App\User', 'userId');
    }
    
    public function wallet(){
        return  $this->hasMany('App\Wallet','user_id','userId');
    }
}
