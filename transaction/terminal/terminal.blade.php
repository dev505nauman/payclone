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
    <li class="breadcrumb-item active" aria-current="page">Terminal</li>
  </ol>
</nav>
  <div class="panel panel-headline">
     
        <div class="panel-heading">
            <h3 class="panel-title">Terminal</h3>
        </div>
        <div class="panel-body">
             <span>Amount</span>
      <input id="msg" type="text" class="form-control" name="msg" placeholder="$0.00">
   <br/>
    <span>Note</span>
      <textarea id="msg" class="notes" name="msg" placeholder="Text for Notes"></textarea>
      <br/>
    <span>Customer</span>
      <input id="msg" type="text" class="form-control" name="msg" placeholder="Name">
      <br/>
  <form>
     <div class="input-group" style="box-shadow: 0px 0px 0px 0 rgba(0, 0, 0, 0)">
      <span class="input-group-addon">Card Number</span>
      <input id="msg" type="text" class="form-control cardwidth" name="msg" placeholder="4111 1111 1111 1111">
      <span class="input-group-addon">Expiration Date</span>
      <input id="msg" type="text" class="form-control" name="msg" placeholder="MM / YY">    
     </div>
  </form>
  <br/>
   <form>
     <div class="input-group" style="box-shadow: 0px 0px 0px 0 rgba(0, 0, 0, 0)">
      <span class="input-group-addon" style="padding: 0 40px 0 41px;">CVV</span>
      <input id="msg" type="text" class="form-control cardwidth" name="msg" placeholder="123"> 
      <span class="input-group-addon" style="padding: 0 50px 0 50px;">Zip</span>
      <input id="msg" type="text" class="form-control" name="msg" placeholder="44400">    
     </div>
  </form>
  <br/>
  <button class="btn btn-info" style="background-color:#00AAFF">Submit</button>
            
        </div>
    </div>


 
  
</div>

@endsection

@section('scripts')


@endsection
