<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WalletsLog;
use App\Wallet;
use App\user;
use App\funding;
use App\BankLog;
use Carbon\Carbon;
use Config;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $arr = array();
        $arr2=array();
        $dt = date('d-m-y');
        $from = date('d-m-y' ,strtotime( '-7 days' ));
        // dd($from);
       
       $now = Carbon::now();
       $past = Carbon::today()->subDays(7);
        
        // dd($now);
        
        //Total logs count
        $total = WalletsLog::all();
        
        // logs of this week count
        $logs = WalletsLog::whereBetween('created_at', [$past , $now])->get(); //this week
       
        //Today logs
        $today = WalletsLog::whereDate('date', $dt)->get();//sum('amount');
        
        if($logs != ''){
        foreach($logs as $log){  // this foreach for jquery graph ploting
        $arr[] = $log['amount'];
        $arr2[] = $log['date'];
        }
        }else{
            $arr[]=0;
            $arr2[]=0;
        }
        
        // logs of Last week count
        $lastWeek = WalletsLog::whereBetween('date', [date('d-m-y' ,strtotime( '-14 days' )) , $from])->get();
        
        $diffThisWeek = count($logs)/count($total)*100;
        $diffLastWeek = count($lastWeek)/count($total)*100;
        
        $difference = round($diffThisWeek - $diffLastWeek);
        
        if($difference > 0)
        $flag = 1;  //On Profit
        else
        $flag = 0; //InLoss
        
        //This Week Sum of Amounts
        $sumThisWeek = WalletsLog::whereBetween('created_at', [$past , $now])->sum('amount');
        
        //Average Transaction
        if($sumThisWeek != 0){
        $average = round($sumThisWeek/count($logs),1);
        }else{
            $average=0;
        }
        $highest = WalletsLog::whereBetween('created_at', [$past , $now])->max('amount');
        
        
        //All Customers Past 7 Days
        $customers = user::where('role_id',2)->whereBetween('created_at', [carbon::now()->subDays(7)->toDateString().' 00:00:00' ,carbon::now()->toDateString().' 00:00:00'])->get();
       
        //All Customers
        $allCustomers = user::where('role_id',2)->get();
        
        $customer_spending = array();
        //Customer Spending
        foreach($allCustomers as $allCustomer){
           $bank_amount = bankLog::where('amount_sender_id',$allCustomer->id)->whereBetween('created_at', [carbon::now()->subDays(7)->toDateString().' 00:00:00' ,carbon::now()->toDateString().' 00:00:00'])->sum('amount');
           $wallet_amount = walletsLog::where('transfer_by',$allCustomer->id)->whereBetween('created_at', [carbon::now()->subDays(7)->toDateString().' 00:00:00' ,carbon::now()->toDateString().' 00:00:00'])->sum('amount');
           $customer_spending[]=[$allCustomer->fname , $bank_amount+$wallet_amount];
        }
        
        // Funding Section
        $funding_amount = array();
        $funding_instance = array();
        $amount=0;
            foreach($allCustomers as $fund){
                $funding_amount['name'] = $fund->fname;
                $funding_amount['value'] = $amount = funding::where('userId',$fund->id)->sum('fundingAmount');
                $funding_amount['grand'] = $funding_amount['value']+$amount; 
                $funding_instance[]=$funding_amount;
            }
            
            
    
        return view('home',compact('arr','arr2','today','dt','from','total','difference','flag','sumThisWeek','average','highest','customers','customer_spending','funding_instance'));
    }
    
    
    public function searchDates(Request $req){
        
        $dt = date('d-m-y', strtotime($req->date2)); // to Date (Big Date)
        $from = date('d-m-y', strtotime($req->date1)); //from date (small Date)
        //Total logs count
        $total = WalletsLog::all();
        
        // logs of this week count
        $logs = WalletsLog::whereBetween('date', [$from , $dt])->get(); //this week
        
        
        
        //Today logs
        $today = WalletsLog::whereDate('date', $dt)->get();//sum('amount');
        
        
        foreach($logs as $log){  // this foreach for jquery graph ploting
        $arr[] = $log['amount'];
        $arr2[] = $log['date'];
        }
        
        // logs of Last week count
        $lastWeek = WalletsLog::whereBetween('date', [date('d-m-y' ,strtotime($req->date1.'-7 day')) , $from])->get();
        
        $diffThisWeek = count($logs)/count($total)*100;
        $diffLastWeek = count($lastWeek)/count($total)*100;
        
        $difference = round($diffThisWeek - $diffLastWeek);
        
        if($difference > 0)
        $flag = 1;  //On Profit
        else
        $flag = 0; //InLoss
        
        //This Week Sum of Amounts
        $sumThisWeek = WalletsLog::whereBetween('date', [$from , $dt])->sum('amount');
        
        //Average Transaction
        if($logs != Null){
        $average = round($sumThisWeek/count($logs),1);
        }
        else $average = 0;
        $highest = WalletsLog::whereBetween('date', [$from , $dt])->max('amount');
        
        
        //All Customers Past 7 Days
        $customers = user::where('role_id',2)->whereBetween('created_at', [carbon::now()->subDays(7)->toDateString().' 00:00:00' ,carbon::now()->toDateString().' 00:00:00'])->get();
        
        //All Customers
        $allCustomers = user::where('role_id',2)->get();
        
        $customer_spending = array();
        //Customer Spending
        foreach($allCustomers as $allCustomer){
           $bank_amount = bankLog::where('amount_sender_id',$allCustomer->id)->whereBetween('created_at', [carbon::now()->subDays(7)->toDateString().' 00:00:00' ,carbon::now()->toDateString().' 00:00:00'])->sum('amount');
           $wallet_amount = walletsLog::where('transfer_by',$allCustomer->id)->whereBetween('created_at', [carbon::now()->subDays(7)->toDateString().' 00:00:00' ,carbon::now()->toDateString().' 00:00:00'])->sum('amount');
           $customer_spending[]=[$allCustomer->fname , $bank_amount+$wallet_amount];
        }
    
        return view('ajaxReturnHome',compact('arr','arr2','today','dt','from','total','difference','flag','sumThisWeek','average','highest','customers','customer_spending'));
        
    }
    
   
    public function test(){

        $nd = walletsLog::where('amount','<',walletsLog::max('amount'))->max('amount');
        $rd = walletsLog::where('amount','<',$nd)->max('amount');
        
        dd($rd);
    }
    
    
    public function sess(){
       // $a = Config::get(('session.lifetime') * 60) - time() / 60;
       $a =  Session(['lastActive'=> date('U')]);
       
        dd(Carbon::createFromTimestamp(Session('lastActive')));
    }
    
    
    
}
