<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WalletsLog;
use Carbon\Carbon;
use Session;
use Response;

class ReportingController extends Controller
{
    public function index(){
        $reports = WalletsLog::get();
        // dd($reports);
        return view('admin.reportings.index',compact('reports'));
    }
    
    public function dynamicReporting(Request $req){
        // dd($req->all());
        $from = explode("\\",$req->dateStart);
        $to = explode("\\",$req->dateEnd);
        
        $query = new WalletsLog;
	    
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
	    $table = WalletsLog::all();
    $filename = "wallets_log.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, array('Transfer_Name', 'Amount', 'Date', 'Transferred To'));

    foreach($table as $row) {
        fputcsv($handle, array($row['bank_name'],$row['amount'], $row['created_at']->format('d-M-Y'), $row->logsname()->where('id','=',$row['wallet_id'])->first()->name));
    }

    fclose($handle);

    $headers = array(
        'Content-Type' => 'text/csv',
    );

    return Response::download($filename, 'wallets_log.csv', $headers);
	    
	}
}
