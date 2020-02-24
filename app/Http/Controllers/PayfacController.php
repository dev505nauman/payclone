<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchant;
use Auth;

class PayfacController extends Controller
{
    public function index(){
        $payfac = Merchant::where('user_id',Auth::user()->id)->get();
        return view('admin.payfac.index',compact('payfac'));
    }
}
