<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Ticket;
use App\User;
use App\UserModule;
use App\UserCustomColumnValue;
use App\UserCustomColumn;




use Session;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* merchants index page */
    public function merchants()
    {
        $merchants = User::where('role_id',2)->get();
        return view('admin.merchants.index',compact('merchants'));
    }
    
    public function ticketManagement()
    {
        $tickets = Ticket::all();
        if($tickets!=null)
        {
            foreach($tickets as $ticket)
            {
                $ticket->sender_info = User::where('id',$ticket->created_by)->first();
            }
        }
        return view('admin.support.tickets',compact('tickets'));
    }
    
    public function customFields()
	{
	    return view('admin.customers.customFields');
    }
	    
	 public function saveCustomField(Request $req)
	{
	    $UserModule = new UserModule;
	    $UserModule->moduleName = $req->module;
	    $UserModule->save();
	   
	    UserCustomColumn::insert([
	        'userId'=>Auth::user()->id,
	        'moduleId'=>$UserModule->id,
	        'columnName'=>$req->customName,
	        'columntype'=>$req->fieldType,
	        ]);
	    
	    dd("success");
	    return view('admin.customers.customFields');
    }
}
