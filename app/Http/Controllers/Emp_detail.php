<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_emp_detail;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers;
use Auth;
use DataTables;

class Emp_detail extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $emp_detail = tbl_emp_detail::all();
        
            return view('employee.emp_insert');
        }
        else 
        {
            return view('welcome');
        }
        
    }
    public function getdata()
    {
        $students = tbl_emp_detail::all();
        return DataTables::of($students)->make(true);
    }

    public function add_employee(Request $req)
    {
        $name = $req->get('name');
        $message= $req->get('message');

        tbl_emp_detail::insert(['name'=>$name, 'message'=>$message]);

        echo "Message Saved";
    }

    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = tbl_emp_detail::where('name', 'LIKE', "%{$query}%")->get();
      
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

}
