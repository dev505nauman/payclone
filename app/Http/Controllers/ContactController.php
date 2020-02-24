<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CustomerContact;
use App\MergeContact;
use Session;
use Response;
use Auth;

class ContactController extends Controller
{
    public function index()
	{
	    $mergeId=array();
	    $allUsers = User::where('role_id',2)->where('added_by',Auth::user()->id)->get();
	    $merge = MergeContact::where('added_by',Auth::user()->id)->get();
	    
	    foreach($merge as $hh){
	        $mergeId[] = $hh->merge_contact_1;
	        $mergeId[] = $hh->merge_contact_2;
	    }
	    
	    $users = User::whereNotIn('id',$mergeId)->where('role_id',2)->get();
	    return view('admin.contacts.index',compact('users','merge','allUsers'));
	   
	}
	
	public function addContact(Request $request)
	{
	    $contact=new CustomerContact();
	    $contact->user_id=$request->user_id;
	    $contact->phone_no=$request->phone_no;
	    $contact->address=$request->address;
	    $contact->city=$request->city;
	    $contact->state=$request->state;
	    $contact->zip=$request->zip;
	    $contact->save();
	    
	    Session::flash('message', 'Contact added successfully!'); 
	    Session::flash('alert-class', 'alert-success');
	    
	    return redirect()->back();
	}
	
	public function viewContact($id)
	{
	    $contacts=CustomerContact::join('users','users.id','=','customer_contacts.user_id')
	   ->where('customer_contacts.user_id',$id)
	   ->select('customer_contacts.phone_no','customer_contacts.address','customer_contacts.city','customer_contacts.state','customer_contacts.zip','users.fname','users.lname','customer_contacts.id as contact_id')
	   ->get();
	   //dd($contacts);
	    return view('admin.contacts.view_contact',compact('contacts'));
	}
	
	public function deleteContact(Request $request)
	{   
	    $id = explode(',',$request->id);
	    foreach ($id as $id){
	        
	        $user = CustomerContact::where('id',$id)->Delete();
	    }
	    
	    //dd("Success");
	    Session::flash('message', 'Contact Deleted Successfully!'); 
	    Session::flash('alert-class', 'alert-success');
	    return redirect()->back();
	    
	    
	}
	
		public function retrieveContact(Request $request)
	{
	    
	    $contact = CustomerContact::where('id',$request->id)->first();
	     return Response::json(['data'=>$contact]);
	}
	
		public function updateContact(Request $request)
	{
	    $user = CustomerContact::findOrFail($request->id);
	    $user->phone_no = $request->phone_no;
	    $user->address = $request->address;
	    $user->state = $request->state;
	    $user->city = $request->city;
	    $user->zip = $request->zip;
	    $user->save();
	    
	    Session::flash('message', 'Contact updated successfully!'); 
	    Session::flash('alert-class', 'alert-success');
	    
	    return redirect()->back();
	}
	
	public function mergeContactData(Request $request)
	{   
	    $user = array();
	    
	    foreach ($request->id as $id){
	       $user[] = User::where('id',$id)->first();
	    }
	     if($user[0]['companyName'] == $user[1]['companyName']){
	        return Response::json(['data'=>$user,'flag'=>0]);
	    }else{
	        return Response::json(['data'=>'These Contacts Cannot Be Merged ,Company Name Should Be Same','flag'=>1]);
	    }
	}
	
	public function mergeContactSave(Request $request)
	{       $company = user::where('id',$request->id1)->first();
	
	      $mergeContact = MergeContact::insert([
	     'fname'=>$request->mergeFname,
	     'lname'=>$request->mergeLname,
	     'dob'=>$request->mergeDob,
	     'email'=>$request->mergeEmail,
	     'merge_contact_1'=>$request->id1,
	     'merge_contact_2'=>$request->id2,
	     'companyName'=>$company['companyName'],
	     'added_by'=>Auth::user()->id
	     ]);
	    
	     Session::flash('message', 'Contacts Merged Successfull!'); 
         Session::flash('alert-class', 'alert-success'); 
	   	 return redirect()->back();
	}

}
