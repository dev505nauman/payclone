<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserModule;
use App\UserCustomColumn;
use App\UserCustomColumnValue;
use App\MergeCustomer;
use App\Wallet;
use App\WalletsLog;
use App\bank_account;
use App\batch;
use App\transaction;
use Auth;
use Schema;
// use Request;

use Session;
use Response;

class CustomerController extends Controller
{
    public function __construct()
	{
    	$this->middleware('auth');
	}

	/* customers index page */
	public function index()
	{
	    $mergeId=array();
	    $merge = MergeCustomer::where('added_by',Auth::user()->id)->get();
	    
	    foreach($merge as $hh){
	        $mergeId[] = $hh->user_one;
	        $mergeId[] = $hh->user_two;
	    }
	    
	    $users = User::whereNotIn('id',$mergeId)->where('added_by',Auth::user()->id)->where('role_id',2)->get();
		return view('admin.customers.index',compact('users','merge'));
	
	}
	
	public function getFirstCustomer()
	{
	    $user = User::where('role_id',2)->where('status',1)->first();
	    
	    return Response::json(['data'=>$user]);
	}
	
	public function retrieveCustomer(Request $request)
	{
	   $user = User::where('id',$request->id)->first();
	   
	    $module = UserModule::where('moduleName','customers')->first();
	    $total = UserCustomColumn::where('moduleId',$module['id'])->get();
	    $values = UserCustomColumnValue::where('userId',$user['id'])->get();
	    
	     return Response::json(['data'=>$user , 'customCol'=>$total , 'customValue'=>$values]);
	}
	
	public function dynamicSearch(Request $request)
	{
	    $query = new User;
	    if($request->name != null)
	    $query = $query->where('fname',$request->name);
	    if($request->email != null)
	    $query = $query->where('email',$request->email);
	    if($request->phone != null)
	    $query = $query->where('phone_no',$request->phone);
	    if($request->dob != null)
	    $query = $query->where('dob',$request->dob);
	    $query = $query->get();
	   // dd($query);
	     return Response::json(['data'=>$query]);
	}
	
	public function addCustomer(Request $request)
	{
	    $userExist = User::where('email',$request->email)->first();
	    if($userExist!=null)
	    {
	        Session::flash('message', 'Email already exist!'); 
	        Session::flash('alert-class', 'alert-warning');
	        return redirect()->back();
	    }
	    
	    else{
	        $user = new user();
	        $user->fname=$request->fname;
	        $user->lname=$request->lname;
	        $user->email=$request->email;
	        $user->role_id=2;
	        $user->added_by=Auth::user()->id;
	        $user->phone_no=$request->phone_no;
	        $user->city=$request->city;
	        $user->state=$request->state;
	        $user->zip=$request->zip;
	        $user->address=$request->address;
	        $user->save();
	        
	       // $userModule = userModule::where('moduleName','customers')->first();
    	   //     if($userModule != null){
    	   //         $customColumn = UserCustomColumn::where('moduleId',$userModule['id'])->get();
    	   //             foreach($customColumn as $customColumns){
    	   //                 $varName=str_replace(" ","_",$customColumns->columnName);
    	                    
    	   //                     UserCustomColumnValue::insert([
        // 	                        'customColumnId'=>$customColumns->id,
        // 	                        'value'=>$request->$varName,
        // 	                        'userId'=>$user->id,
        // 	                        ]);
        // 	                        Session::flash('message', 'Customer added successfully!'); 
        //                     	    Session::flash('alert-class', 'alert-success');
                            	    
    	   //             }
    	   //     }else{
    	   //         Session::flash('message', 'Customer added successfully!'); 
        //     	    Session::flash('alert-class', 'alert-success');
    	   //     }
    	   
    	    Session::flash('message', 'Customer added successfully!'); 
            Session::flash('alert-class', 'alert-success');
    	    return redirect()->back();
    	    
	    }
	}
	
	public function updateCustomer(Request $request)
	{
	    $user = User::findOrFail($request->id);
	    $user->fname = $request->fname;
	    $user->lname = $request->lname;
	    $user->email = $request->email;
	    $user->phone_no = $request->phone_no;
	    $user->address = $request->address;
	    $user->state = $request->state;
	    $user->city = $request->city;
	    $user->zip = $request->zip;
	    $user->save();
	    
	    
	    $userModule = userModule::where('moduleName','customers')->first();
    	        if($userModule != null){
    	            $customColumn = UserCustomColumn::where('moduleId',$userModule['id'])->get();
    	                foreach($customColumn as $customColumns){
    	                    $varName=str_replace(" ","_",$customColumns->columnName);
    	                        $customValue = UserCustomColumnValue::where('userId',$user->id)->where('customColumnId',$customColumns->id)->first();
        	                        if(!$customValue)
        	                        {
        	                            UserCustomColumnValue::insert([
            	                        'value'=>$request->$varName,
            	                        'userId'=>$user->id,
            	                        'customColumnId'=>$customColumns->id
            	                        ]);
            	                        
        	                        }else{
        	                            UserCustomColumnValue::where('userId',$user->id)->where('customColumnId',$customColumns->id)->update([
            	                        'value'=>$request->$varName,
            	                        ]);
        	                        }
    	                }
    	        }
    	        
	    Session::flash('message', 'Customer updated successfully!'); 
	    Session::flash('alert-class', 'alert-success');
	    
	    return redirect()->back();
	}
	
	public function deleteCustomer(Request $request)
	{   
	    $id = explode(',',$request->id);
	    foreach ($id as $id){
	        
	        $user = User::where('id',$id)->Delete();
	        UserCustomColumnValue::where('userId',$id)->Delete();
	        
	    }
	    
	    //dd("Success");
	    Session::flash('message', 'Customer(s) Deleted Successfully!'); 
	    Session::flash('alert-class', 'alert-success');
	    return redirect()->back();
	    
	    
	}
	
	public function mergeCustomerData(Request $request)
	{   
	    $user = array();
	    
	    foreach ($request->id as $id)
	       $user[] = User::where('id',$id)->first();
	        
	        return Response::json(['data'=>$user]); 
	    
	}
	
	public function mergeCustomerSave(Request $request)
	{   
	     $mergeCustomer = mergeCustomer::insert([
	     'fname'=>$request->mergeFname,
	     'lname'=>$request->mergeLname,
	     'dob'=>$request->mergeDob,
	     'email'=>$request->mergeEmail,
	     'user_one'=>$request->id1,
	     'user_two'=>$request->id2,
	     'added_by'=>Auth::user()->id
	     ]);
	     return redirect()->back();
	}
	
	
	
	public function csvTransfer(Request $request)
	{   
	    $table = User::where('role_id',2)->get();  //1st Part
	    
    $filename = "customers.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, array('Reference Id','First Name','Last Name','Email', 'Phone Number','Nick Name','Company Name', 'Address','City' ,'State' ,'Postal Code' ,'Birthday' ,'Memo','Customer ID','Creation Source','First Visit','Last Visit','Transaction Count','Total Spent' ,'Email Unsubscribe','Instant Profile','Preference'));

    foreach($table as $row) {
        $trans = batch::where('user_id',$row['id'])->count();
        $transFirst = batch::where('user_id',$row['id'])->first();
        $transLast = batch::where('user_id',$row['id'])->orderBy('id','DESC')->first();
        $sum = batch::where('user_id',$row['id'])->sum('amount');
        
        fputcsv($handle, array('Null',$row['fname'],$row['lname'], $row['email'], $row['phone_no'],$row['nickname'],$row['companyName'],$row['address'],$row['city'],$row['state'],$row['zip'],$row['dob'],$row['memo'],$row['creationSource'],$transFirst['created_at'],$transLast['created_at'],$transFirst['created_at'],$trans,$sum,"NO","Null","Null"));
    }

    fclose($handle);

    $headers = array(
        'Content-Type' => 'text/csv',
    );

    return Response::download($filename, 'customers.csv', $headers);
	    
	}
	
	
	public function retrieveSearchedCustomer(Request $req){
	    
	    $var = '%'.$req->search.'%';
	    $arr=array();
	    
	    $search = user::where('fname','like',$var)->get(); //search result
	    $mergeCustomer = mergeCustomer::where('user_id',Auth::user()->id)->first();  //If merging available for the user
	    if($mergeCustomer){
	        $mergingContact = mergeCustomerlist::where('merge_customer_id',$mergeCustomer['id'])->get(); //grouping
	          foreach($search as $searches){
	            foreach($mergingContact as $mergingContacts){
	                if($mergingContacts->merge_id == $searches->id){
	                    array_push($arr,$mergingContacts->merge_id);
	                }else
            	    { 
            	        array_push($arr,$searches->id);
            	    }
	            }
	        }
	    }
	    
	    dd($arr);
	    
	}
	
	
	public function addCustomColumn(Request $request)
	{  
	    $type='';
	    $moduleId='';
	    if($request->colType == 1)
	    $type="text";
	    else
	    $type="number";
	    
	    $module = UserModule::where('moduleName',$request->module)->first();
	    
	    if(!$module){
	    
	    $newModule= new UserModule();
	    $newModule->moduleName = $request->module;
	    $newModule->save();
	    $moduleId = $newModule->id;
	    }
	    
	    else
	    $moduleId = $module['id'];
	    
	    UserCustomColumn::insert([
	        'moduleId'=>$moduleId,
	        'columnName'=>$request->colName,
	        'columnType'=>$type,
	        ]);
	   
	   Session::flash('message', 'New Column Added Successfully!'); 
	    Session::flash('alert-class', 'alert-success');
	    return redirect()->back();
	}
	
	public function getCustomColumn(){
	    
	    $module = UserModule::where('moduleName','customers')->first();
	    $total = UserCustomColumn::where('moduleId',$module['id'])->get();
	    return Response::json(['data'=>$total]);
	}
	
	public function customerDetail(Request $req){
	   // dd($req->all());
	   $walletsBalance = 0;
	   $user = user::where('id',$req->id)->first();
	   $wallet = Wallet::where('user_id',$req->id)->get();
	   foreach($wallet as $wallets){
	       $walletsBalance += WalletsLog::where('wallet_id',$wallets->id)->sum('amount');
	   }
	   $bank_account = bank_account::where('user_id',$req->id)->get();
	   $batch = batch::where('user_id',$req->id)->get();
	   $transaction = transaction::where('user_id',$req->id)->get();
	   $total= (Wallet::where('user_id',$req->id)->sum('value'))+(bank_account::where('user_id',$req->id)->sum('balance'));
	   //dd($wallet);
	    return view('admin.customers.customerDetail',compact('user','wallet','bank_account','transaction','batch','total','$walletsBalance'));
	}

}
