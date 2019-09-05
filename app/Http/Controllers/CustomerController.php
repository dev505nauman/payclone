<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
	{
    	$this->middleware('auth');
	}

	/* customers index page */
	public function index()
	{
		return view('admin.customers.index');
	}
}
