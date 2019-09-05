<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
      public function __construct()
	{
    	$this->middleware('auth');
	}

	/* payment gatrway index page */
	public function index()
	{
		return view('admin.gateways.index');
	}
}
