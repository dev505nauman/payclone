<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Wallet;
class WalletsLog extends Model
{
    
    public function logs()
{
    return $this->belongsTo(Wallet::class, 'wallet_id');
}

    public function logsname(){
        $a = Wallet::all();
        // dd($a);
         return $a;
    } 
}
