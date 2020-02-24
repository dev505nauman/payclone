@extends('layouts.admin')

@section('pagename')
Account Settings
@endsection

@section('content')
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Settings</li>
  </ol>
</nav>
  <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Settings</h3>
        </div>
        <div class="panel-body">
            <form action="{{ route('update-profile') }}" method="post" class="form-horizontal">
                @csrf
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" value="{{ Auth::user()->fname }}"><br>
                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" value="{{ Auth::user()->lname }}"><br>
                <input type="date" class="form-control" name="dob" id="dob" value="{{ Auth::user()->dob }}"><br>
                <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Enter Phone No" value="{{ Auth::user()->phone_no }}"><br>
                <textarea class="form-control" placeholder="Enter Address" name="address" id="address" value="{{ Auth::user()->address}}" rows="4" cols="40"></textarea><br>
                <input type="text" class="form-control" name="state" id="state" placeholder="Enter State" value="{{ Auth::user()->state }}"><br>
                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="{{ Auth::user()->city }}"><br>
                <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter ZIP" value="{{ Auth::user()->zip }}"><br>

                <button type="submit" class="btn btn-primary"> <span> Save </span></button>
            </form>
        </div>
    </div>
@endsection
