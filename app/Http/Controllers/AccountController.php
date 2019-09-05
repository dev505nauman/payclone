<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Response;
use Session;
use Auth;

class AccountController extends Controller
{
    public function __construct()
	{
    	$this->middleware('auth');
	}

	/* account settings page */
	public function settings()
	{
		return view('admin.settings.index');
	}

	/* update account settings */
	public function updateProfile(Request $request)
	{
		$user = User::findOrFail(Auth::user()->id);
		$user->name = $request->name;
		$user->save();

		Session::flash('message', 'Account settings updated successfully!'); 
		Session::flash('alert-class', 'alert-success');

		return redirect()->back(); 
	}
}
