<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Response;
use Session;
use Auth;
use Hash;

class AccountController extends Controller
{
    public function __construct()
	{
    	$this->middleware('auth');
	}

	/* account settings page */
// 	public function settings()
// 	{
// 		return view('admin.settings.index');
// 	}
	
	public function settings()
	{
	    $data = user::where('id',Auth::user()->id)->first();
		return view('admin.settings.settings2',compact('data'));
	}

	/* update account settings */
	public function updateProfile(Request $request)
	{
	    $user = User::findOrFail(Auth::user()->id);
		$user->fname = $request->fname;
		$user->lname = $request->lname;
		$user->phone_no = $request->phone_no;
		$user->address = $request->address;
		$user->dob = $request->dob;
		$user->state = $request->state;
		$user->city = $request->city;
		$user->zip = $request->zip;
		$user->save();

		Session::flash('message', 'Account settings updated successfully!'); 
		Session::flash('alert-class', 'alert-success');

		return redirect()->back(); 
	}
	
	public function passwordChange(Request $req)
	{
	    user::where('id',auth::user()->id)->update([
	        'password' => bcrypt($req->newPass)
	        ]);
	        
	   return redirect()->back()->with('msg','Password Change Successful');
	}
	
	public function passCheck(Request $req)
	{
	   // dd(1234);
	    $oldPass = user::where('id',auth::user()->id)->select('password')->first();
	    
	    if(Hash::check($req->pass , $oldPass['password'])){
	        return response::json(['result'=>'true']);
	    }
	    
	    else return response::json(['result'=>'false']);
	}

}
