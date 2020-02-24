<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Ticket;
use App\TicketReply;
use App\User;

use Response;
use Session;
use Auth;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* support index page */
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.support.index',compact('tickets'));
    }

    /* add ticket post call */
    public function addTicket(Request $request)
    {
        $user_id = Auth::user()->id; //example from session variable
        $cur_date = date('dmyHis'); //timestamp ticket submitted
        $ticket_id = '#'.$user_id.'-'. $cur_date;

        $ticket = new Ticket();
        $ticket->unique_id = $ticket_id;
        $ticket->subject = $request->subject;
        $ticket->category = $request->category;
        $ticket->message = $request->message;
        $ticket->created_by = Auth::user()->id;
        $ticket->save();

        Session::flash('message', 'Ticket has been submitted successfully!'); 
        Session::flash('alert-class', 'alert-success'); 

        return redirect()->back();
    }

     public function viewTicket(Request $request)
    {
        $ticket = Ticket::where('id',$request->id)->first();
        $replies = TicketReply::where('ticket_id',$ticket['id'])->get();
        if($replies!=null)
        {
            foreach($replies as $reply)
            {
                $reply['sender_info'] = User::where('id',$reply['sender_id'])->first();
            }
        }
        return view('admin.support.ticket-detail',compact('ticket','replies'));
    }
    
    public function replyTicket(Request $request)
    {
        $reply = new TicketReply();
        $reply->message = $request->message;
        $reply->ticket_id = $request->ticket_id;
        $reply->sender_id = Auth::user()->id;
        if(Auth::user()->role_id==1)
        {
            $reply->sender_type = 'admin';
        }
        else
        {
            $reply->sender_type = 'customer';
        }
        $reply->save();
        
        Session::flash('message', 'Reply has been submitted successfully!'); 
        Session::flash('alert-class', 'alert-success'); 

        return redirect()->back();
    }
    
    public function closeTicket(Request $request)
    {
        $ticket = Ticket::findOrFail($request->id);
        $ticket->status=2;
        $ticket->save();
        
        Session::flash('message', 'Ticket has been closed successfully!'); 
        Session::flash('alert-class', 'alert-success'); 

        return Response::json(['status'=>'success']);
        
        
    }
    
}
