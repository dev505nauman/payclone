<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gateway;
use App\user;
use App\transaction;
use App\bank_account;
use App\Wallet;
use App\batch;
use App\BatchLog;
use App\BatchesInfo;
use App\funding;
use DateTime;
use Auth;
use Mail;
use Carbon\Carbon;

class PaymentGatewayController extends Controller
{
      public function __construct()
	{
    	$this->middleware('auth');
	}

	/* payment gatrway index page */
	public function index()
	{
	    $gateways = Gateway::all();
		return view('admin.gateways.index1',compact('gateways'));
	}
	
	public function addGateway(Request $request)
	{
	    $gateway = Gateway::where('id',$request->id)->first();
	    
	    return view('admin.gateways.add',compact('gateway'));
	}
	
	public function charge(){
	    $trans = transaction::get();
	    $users = user::where('role_id',2)->get();
	    $charge = transaction::where('date',date('d-m-y'))->where('user_id',Auth::user()->id)->get();
	    return view('transaction.transaction',compact('users','charge'));
	}
	
	public function batches(){
	    
	    $all = batch::all();
	    return view('transaction.batches',compact('all'));
	}
	
	public function viewBatchData(Request $req){
	    
	    $batch = batch::where('id',$req->id)->first();
	    $batchData = BatchesInfo::where('batch_id',$req->id)->first();
	    $transaction = BatchLog::where('batch_id',$req->id)->get();
	    
	     //return response()->json(['batch'=>$batch,'batchData'=>$batchData,'transaction'=>$transaction]);
	    
	    return view('transaction.batchDescription',compact('batch','batchData','transaction'));
	}
	
	
	//Cron Job Listed Here
	
	public function CronJobForApproveBatch(){
	   // dd("Hello");
	    $amount = batch::whereDate('created_at','<',date('Y-m-d'))->get();
	          foreach($amount as $allAmount){
	              $info = BatchesInfo::where('batch_id',$allAmount->id)->first();
            	    $percentAmount = 0;
            	    //Here Code for dividing amount into banks
                    	   $banks = bank_account::where('user_id',$allAmount->user_id)->get();
                    	    $wallets = Wallet::where('user_id',$allAmount->user_id)->get();
                    	       foreach($banks as $bank){
                        	            $percentAmount = $allAmount->amount /100 * $bank->amount_percent;
                        	            BatchLog::insert([
                            	         'user_id' => $bank->user_id,
                            	         'date' => date('d-m-y'),
                            	         'method' => $info['type']." payment",     //To get from blade call
                            	         'amount' => $percentAmount,
                            	         'authCode' => "ath36",          //To get from blade call
                            	         'transactionTo' => $bank->name.' (Bank)',
                            	         'batch_id'=> $allAmount->id
                            	         ]);
                            	         
                        	    }// foreach close
                        
                        	    foreach($wallets as $wallet){
                        	            $percentAmount = $allAmount->amount /100 * $wallet->value;
                        	            BatchLog::insert([
                            	         'user_id' => $wallet->user_id,
                            	         'date' => date('d-m-y'),
                            	         'method' => $info['type']." payment",     //To get from blade call
                            	         'amount' => $percentAmount,
                            	         'authCode' => "ath36",          //To get from blade call
                            	         'transactionTo' => $wallet->name.' (Wallet)',
                            	         'batch_id'=> $allAmount->id
                            	         ]);
                            	         
                        	    }// foreach close
    	    
	           batch::where('id',$allAmount->id)->update(['status'=>1]);
	    }
	}
	
	
	public function approveBatch(Request $req){
	    $batchInfo = BatchLog::where('batch_id',$req->id)->get();
	    if(count($batchInfo)>0){
	        return redirect()->back()->with('message','Batch Already Updated');
	    }
	   $amount = batch::where('id',$req->id)->first();
	   $info = BatchesInfo::where('batch_id',$req->id)->first();
	   
	    $percentAmount = 0;
	    //Here Code for dividing amount into banks
        	   $banks = bank_account::where('user_id',Auth::user()->id)->get();
        	       foreach($banks as $bank){
            	            $bankAmount = $amount['amount'] /100 * $bank->amount_percent;
            	            BatchLog::insert([
                	         'user_id' => $bank->user_id,
                	         'date' => date('d-m-y'),
                	         'method' => $info['type']." payment",     //To get from blade call
                	         'amount' => $bankAmount,
                	         'authCode' => "ath36",          //To get from blade call
                	         'transactionTo' => $bank->name.' (Bank)',
                	         'batch_id'=> $amount['id'],
                	         ]);
                	         
            	    }// foreach close
                $wallets = Wallet::where('user_id',Auth::user()->id)->get();
            	    foreach($wallets as $wallet){
            	            $walletAmount = $amount['amount'] /100 * $wallet->value;
            	            BatchLog::insert([
                	         'user_id' => $wallet->user_id,
                	         'date' => date('d-m-y'),
                	         'method' => $info['type']." payment",     //To get from blade call
                	         'amount' => $walletAmount,
                	         'authCode' => "ath36",          //To get from blade call
                	         'transactionTo' => $wallet->name.' (Wallet)',
                	         'batch_id'=> $amount['id'],
                	         ]);
            	    }// foreach close
	    
	           batch::where('id',$req->id)->update(['status'=>1]);
	         
	         return redirect()->back()->with('message','Batch Updated Successful');
	}
	
	public function chargeTransaction(Request $req){
	    
	    if($req->trans == 'fund'){
	      funding::insert([
	     'userId'=>$req->location,
	     'fundingDate'=>date('d-m-y'),
	     'location'=>'Funding Wallet',
	     'fundingType'=>'visa',
	     'fundingAmount'=>$req->amount,
	     ]);
	    }
	    
	    else{
	    
	   	   $id = new batch();
    	   $id->user_id = $req->location;
    	   $id->location = "test location";
    	   $id->amount = $req->amount;
    	   $id->batchCloseDate = date('d-m-y' ,strtotime( '+1 days' ));
    	   $id->status = 0;
    	   $id->save();
    	   
    	   
	   BatchesInfo::insert([
         'batch_id' => $id['id'],
         'fname' => $req->fname,
         'lname' => $req->lname,
         'email' => $req->email,
         'address' => $req->address,
         'city' => $req->city,
         'state' => $req->state,
         'zip' => $req->zip,
         'action' => $req->action,
         'transactionType' => $req->trans,
         'authType' => $req->auth,
         'processedBy' => $req->process,
         'description' => $req->description,
         'type'=>$req->type,
       ]);
	   
	   }
	         
	         return response()->json(['data'=>'success']);
	}
	
	public function testjson(Request $req){
	     return response()->json();
	}
	
	public function smartTerminalAmount(Request $req){
	     //dd($req->all());
	     $id = new batch();
    	   $id->user_id = 24; //Id of the payer  //Auth::user()->id;
    	   $id->location = "Test Location";
    	   $id->amount = $req->amount;
    	   $id->batchCloseDate = date('d-m-y' ,strtotime( '+1 days' ));
    	   $id->status = 0;
    	   $id->save();
    	   
    	   
	   BatchesInfo::insert([
         'batch_id' => $id['id'],
         'email' => $req->email,
         'description' => $req->desc,
      ]);
    
     $data= array('invoice'=>'inv'.$req->invoice,'fname'=>$req->fname,'amount'=>$req->amount,'description'=>$req->desc,'id'=>$id['id']);
	    
	    $fromaddr=$req->email;
	   
	    Mail::send('mail.mail', $data, function ($message) use($fromaddr) {
            $message->from('noreply@fluxpay.com', 'Fluxpay');
            $message->to($fromaddr)->subject('Payment Hosting Page');
        });
    
        return response()->json(['data'=>'success']);
        
	}
	
	public function mailConfirm(){
	    //$invoice = Invoice::where('invoice_number',$invoice_number)->first();
        //$invoice_items = InvoiceItem::where('invoice_id',$invoice['id'])->get();
        //$customer = Customer::where('id',$invoice['client_id'])->first();
    	return view('transaction.signTransaction');//,compact('invoice','invoice_items','customer'));
	}
	
	public function transactions(){
	     $sum=0;
	    $today = transaction::where('date',date('d-m-y'))->get();
	    $all = transaction::where('date','!=',date('d-m-y'))->get();
	    for($i=0;$i<count($today); $i++){
	        $sum = $sum+3;
	    }
	    
	    $charge = transaction::where('date',date('d-m-y'))->sum('amount');
	    
        return view('transaction.transaction-timeline',compact('today','all','sum','charge'));
	}
	
	public function retrieveSearchedBatch(Request $req){
	   if($req->flag==0){
	   
	   $now = Carbon::now();
       $pastWeek = Carbon::today()->subDays(7);
       $pastMonth = Carbon::today()->subDays(30);
       
	   if($req->search == 1)
	   $batch = batch::whereDate('created_at',$now)->get();
	   elseif($req->search == 2)
	   $batch = batch::whereBetween('created_at',[$pastWeek,$now])->get();
	   elseif($req->search == 3)
	   $batch = batch::whereBetween('created_at',[$pastMonth,$now])->get();
	   else
	   $batch = batch::get();
	   
	   }
	   
	   else{
	       if($req->search == 1)
        	   $batch = batch::where('status',1)->get();
        	   elseif($req->search == 2)
        	   $batch = batch::where('status',2)->get();
        	   elseif($req->search == 3)
        	   $batch = where('status',3)->get();
        	   elseif($req->search == 4)
        	   $batch = batch::where('status',4)->get();
        	   else
        	   $batch = batch::get();
        }
        
	    
	    return response()->json(['data'=>$batch]);
	}
	
	public function transactionPage(Request $req){
	    $batchMain = batch::where('id',$req->id)->first();
	    $batch = BatchesInfo::where('batch_id',$req->id)->first();
	    
	    return view('transaction.customerTransactionPage',compact('batch','batchMain'));
	}
	
		public function submitCustomerPayment(Request $req){
		  //  dd($req->all());
		    
		    
// 		batch::where('id',$req->userId)->update(['status'=>1]);
// 	    BatchesInfo::where('batch_id',$req->userId)->update([
// 	        'city'=>$req->city,
// 	        'state'=>$req->state,
// 	        'zip'=>$req->zip,
// 	        ]);

           $user =  $req->userId;
           $cardName= $req->cardName;
           $cardNumber = $req->cardNumber;
           $cardExpiry = $req->cardExpiry;
           $cardCvv = $req->cardCvv;
           $action = $req->action;
           $trans_type = $req->trans_type;
           $auth_type = $req->auth_type;
           $processed_by = $req->processed_by;
           $amount = $req->amount;
           $fname = $req->fname;
           $lname = $req->lname;
           $email = $req->email;
           $addr = $req->addr;
           $city = $req->city;
           $state = $req->state;
           $zip = $req->zip;
           $tDescription = $req->tDescription;
           $digitalSign = $req->digitalSign;
		    
		return view('transaction.invoiceReciept',compact('userId','cardName','cardNumber','cardExpiry','cardCvv','action','trans_type','auth_type','processed_by','amount','fname','lname','addr','city','state','zip','tDescription','digitalSign'));
	    //return redirect('http://payclone.dev505.io/public');
	}
	
		public function csvTransfer(Request $request)
	{   
	    $table = User::where('user_id',auth::user()->id)->get();
    $filename = "customers.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, array('Location', 'Amount', 'Batch Close Date', 'Batch Created Date'));

    foreach($table as $row) {
        fputcsv($handle, array($row['location'].' '.$row['amount'], $row['batchCloseDate'], $row['created_at']));
    }

    fclose($handle);

    $headers = array(
        'Content-Type' => 'text/csv',
    );

    return Response::download($filename, 'batches.csv', $headers);
	    
	}
	
}
