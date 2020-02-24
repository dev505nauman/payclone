@extends('layouts.admin')

@section('pagename')
Terminal
@endsection

@section('content')
<style>
    .cardwidth{
        width:98%!important ;
    }
    .notes{
        width: 100%;
    height: 52px;
        border: 1px solid #eaeaea;
    background-color: #fbfbfb;
    }
</style>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Custom Fields</li>
  </ol>
</nav>
  <div class="panel panel-headline">
     
        <div class="panel-heading">
            <h3 class="panel-title">Add Custom Fields</h3>
        </div>
        <form action="{{route('saveCustomField')}}" method="post">
            @csrf
        <div class="panel-body">
             <span>Select Module</span>
      <select class="form-control" name="module">
          <option>Select option</option>
          <option value="signup">Signup</option>
      </select>
   <br/>
    <span>Custom Field Name</span>
     <input type="text" class="form-control" name="customName" placeholder="Custom Field Name">
      <br/>
    <span>Custom Field Type</span>
      <select class="form-control" name="fieldType">
          <option>Select option</option>
          <option value="text">Text</option>
          <option value="varchar">Long Text</option>
          <option value="int">Integer</option>
          <option value="bigInt">Long Integer</option>
      </select>
      <br/>
 
  <button class="btn btn-info" style="background-color:#00AAFF">Submit</button>
            
        </div>
        </form>
    </div>


 
  
</div>

@endsection

@section('scripts')


@endsection
