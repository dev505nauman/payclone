@extends('layouts.admin')

@section('pagename')
Support
@endsection

@section('content')
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Support</li>
  </ol>
</nav>
  <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Support <a class="btn btn-primary" style="float:right;color:white;" data-toggle="modal" data-target="#addticketmodal">+ Add Ticket</a></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($tickets!=null)
                            @foreach($tickets as $ticket)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$ticket->subject}}</td>
                                <td>@if($ticket->status==1) <span class="badge" style="background-color:orange;">Open</span>@elseif($ticket->status==2) <span class="badge" style="background-color:#89c779;">Closed</span> @endif</td>
                                <td><a href="{{route('view-ticket',['id'=>$ticket->id])}}" title="View"><i class="fa fa-eye"></i></a>&nbsp;<a href="" title="Replies"><i class="fa fa-reply" style="color:#00aaff"></i></a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
  <div class="modal fade" id="addticketmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Ticket</h4>
        </div>
        <form method="post" action="{{ route('add-ticket') }}">
            @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 form-group">
                <label for="subject">Subject<span style="color:red;">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Subject" required name="subject">
            </div>
            <div class="col-md-12 form-group">
                <label for="category">Category<span style="color:red;">*</span></label>
                <select class="form-control" name="category" required>
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

@endsection
