<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\funding;
use Response;
use Auth;

class FundingController extends Controller
{
    public function index(){
        $funding = funding::get();
        return view('funding.funding',compact('funding'));
    }
    
     public function dynamicFunding(Request $req){
        // dd($req->all());
        $from = explode("\\",$req->dateStart);
        $to = explode("\\",$req->dateEnd);
        
        $query = new funding;
        
	    if($req->dateStart != null && $req->dateEnd != null)
	    $query = $query->whereBetween('created_at', [$from,$to]);
	    if($req->startAmount != 0.00 && $req->endAmount != 0.00)
	    $query = $query->whereBetween('amount', [$req->startAmount,$req->endAmount]);
	    
	    $query = $query->get();
	   // dd($query);
	    
	     return Response::json(['data'=>$query]);
    }
    
    public function csvTransfer(Request $request)
	{   
	    $table = funding::where('userId',Auth::user()->id)->get();
    $filename = "funding.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, array('User Name', 'Funding Date', 'Location', 'Funding Type' , 'Funding Amount'));

    foreach($table as $row) {
        fputcsv($handle, array($row['userId'] , $row['fundingDate'], $row['location'], $row['fundingType'], $row['fundingAmount']));
    }

    fclose($handle);

    $headers = array(
        'Content-Type' => 'text/csv',
    );

    return Response::download($filename, 'funding.csv', $headers);
	    
	}
}
