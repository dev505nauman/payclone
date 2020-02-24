@extends('layouts.admin')

@section('pagename')
Support
@endsection

@section('content')
      <!-- MAIN CONTENT -->
        <div class="container-fluid">
          <!-- OVERVIEW -->
         
                     
  <div class="panel panel-headline">
        <div class="panel-heading">
            
            <div class="col-md-8" style="padding-left: 0px">
            <h3 class="panel-title"><b>Ticket Detail</b> <span>[{{$ticket['unique_id']}}]</span></h3>
            
            </div>
            
            
            <div class="col-md-4 date text-center">
                        <h4 style="margin-top: 0px;"><b>Created at:</b> <span><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($ticket['created_at']))->diffForHumans() ?>
</span></h4>
                        @if($ticket['status']==1)
                        <h5><b>Status: </b> <span>Open</span></h5>
                        @if(Auth::user()->role_id==1)
                        <a onclick="closeTicket(this);" class="btn ticket-btn" data-ticket-id="{{$ticket->id}}"> Close Ticket</a>
                        @endif
                        @elseif($ticket['status']==2)
                        <h5><b>Status: </b> <span>Closed</span></h5>
                        @endif
                    </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 ticket-list">
                    <ul>
                        <li><span>Subject:</span>{{$ticket['subject']}}</li>
                        <li><span>Category:</span>{{$ticket['category']}}</li>
                        <li>{{$ticket['message']}}</li>
                    </ul>
                    </div>
                    
                    
                    
                    </div>
                    
                    <div class="row">
                        <div class="col-12 message-col">
                            @if(sizeof($replies)!=0)
                            @foreach($replies as $reply)
                            @if($reply['sender_type']=='customer')
                             <div class="row message-row">
                                <div class="col-md-2 text-center message-img">
                                    <img src="images/default_user.png" alt="Avatar" class="img-circle avatar" style="width:83px;height:73px;">
                                </div>
                                
                                <div class="col-md-6 message">
                                    <b>{{$reply['sender_info']['fname'].' '.$reply['sender_info']['lname']}} ({{$reply['sender_type']}})</b>
                                    <p>{{$reply['message']}}</p>
                                    <span><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($ticket['created_at']))->diffForHumans() ?></span>
                                </div>
                            </div>
                            @else
                            
                            <style>
                                .message2:before {
        border-left: 20px solid #d2d2d2 !important;
    border-top: 20px solid transparent !important;
    border-bottom: 20px solid transparent !important;
    right: -20px;
    left: unset !important;
    top: 14px !important;
    border-right: unset !important;
}

                            </style>
                            <div class="row message-row">
                                
                                
                                <div class="col-md-offset-4 col-md-6 message message2" style=".message:before{display: none;}">
                                    <b>{{$reply['sender_info']['fname'].' '.$reply['sender_info']['lname']}} ({{$reply['sender_type']}})</b>
                                    <p>{{$reply['message']}}</p>
                                    <span><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($ticket['created_at']))->diffForHumans() ?></span>
                                </div>
                                <div class="col-md-2 text-center message-img">
                                    <img src="images/default_user.png" alt="Avatar" class="img-circle avatar" style="width:83px;height:73px;">
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @else
                            <div class="row message-row">
                                <div class="col-md-12 text-center">
                                   <p style="color:black;">No Replies!</p>
                                </div>
                                    </div>
                            @endif
                           <!-- <div class="row message-row">
                                <div class="col-md-2 text-center message-img">
                                    <img src="assets/img/user2.png" alt="Avatar" class="img-circle avatar">
                                </div>
                                
                                <div class="col-md-6 message">
                                    <b>John Doe</b>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <span>6:30 PM</span>
                                </div>
                            </div>-->
                            
                            
                        </div>
                        @if($ticket['status']!=2)
                        <div class="col-12 comment">
                              <form method="post" action="{{ route('reply-ticket') }}">
                                  @csrf
                                  <input type="hidden" name="ticket_id" value="{{$ticket['id']}}">
                               
                                <textarea class="form-control" rows="5" id="comment" name="message" placeholder="Comment Here"></textarea>
                                
                                <button type="submit" class="btn btn-primary">Comment</button>
                              </form>
                        </div>
                        @else
                        <div class="col-12 comment text-center">
                              <p><<< Ticket has been closed! >>></p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    
    <style>
.message p {
    margin-bottom: 5px;
    font-size: 14px;
}
.message span {
    display: block;
    text-align: right;
    font-size: 12px;
}
.comment {
    margin-top: 30px;
}
.comment .form-control {
    width: 100%;
    margin-bottom: 20px;
}
.ticket-list ul {
    list-style-type: none;
    padding-left: 0px;
    
}
.ticket-btn {
    background-color: #f9354c;
    color: #fff;
}

.ticket-list ul li {
    margin-bottom: 15px;
}
.ticket-list span {
    width: 150px;
    display: inline-block;
    font-weight: 700;
    font-size: 20px;
}
.message-row {
    margin: 0px 40px 30px 0px;
}
.message-col {
    background: #f5f5fa;
    color: #FFF;
    padding: 30px 30px 1px;
    margin-top: 20px;
}
.message-img {
    padding-top: 5px;
}
.message {
    background-color: #d2d2d2;
    padding: 12px 12px 5px;
    border-radius: 6px;
    position: relative;
}
.message:before {
    position: absolute;
    content: " ";
    border-right: 20px solid #d2d2d2;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    left: -20px;
    top: 14px;
}
    </style>


    <!-- Modal -->
  <div class="modal fade" id="addticketmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Add Ticket</h4>
        </div>
        <form method="post" action="http://payclone.dev505.io/public/add-ticket">
            <input type="hidden" name="_token" value="470C2io6rz7TlY86BVB37D2f8VzITW9HFjRd7N2k">        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 form-group">
                <label for="subject">Subject<span style="color:red;">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Subject" required="" name="subject">
            </div>
            <div class="col-md-12 form-group">
                <label for="category">Category<span style="color:red;">*</span></label>
                <select class="form-control" name="category" required="">
                    <option value="">Choose Category</option>
                    <option value="">1</option>
                </select>
            </div>
            <div class="col-md-12 form-group">
                <label for="message">Message</label>
                <textarea class="form-control" rows="4" cols="30" name="message"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" type="submit">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
</div>

        </div>
      </div>
@endsection

@section('scripts')
<script>
   function closeTicket(ele)
   {
       var ticket_id = $(ele).attr('data-ticket-id');
       
       bootbox.confirm({
    message: "Are you sure?",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if(result==true)
        {
           $.ajax({

        url: "{{route('close-ticket')}}",
        method:'get',
        dataType:'json',
        data:{
            'id':ticket_id
        },
        success:function(data){
           if(data['status']=='success')
           {
               window.location.reload();
           }
        }
        });
        
    }
}
});
       
   }
</script>

@endsection