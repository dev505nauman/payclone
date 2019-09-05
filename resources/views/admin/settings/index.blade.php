@extends('layouts.admin')

@section('pagename')
Account Settings
@endsection

@section('content')
 
  <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Settings</h3>
        </div>
        <div class="panel-body">
            <form action="{{ route('update-profile') }}" method="post" class="form-horizontal">
                @csrf
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ Auth::user()->name }}"><br>
                <button type="submit" class="btn btn-primary"> <span> Save </span></button>
            </form>
        </div>
    </div>
@endsection
