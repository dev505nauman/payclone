@extends('layouts.admin')

@section('pagename')
Gateway Details
@endsection

@section('content')
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 12px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #009FEF;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  
  left: 6px;
  top: 2px;
  width: 6px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg) ;
  -ms-transform: rotate(45deg) ;
  transform: rotate(45deg) ;
}

/* Create a custom radio button */
.checkmarkround {
  position: absolute;
  top: 0;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmarkround {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmarkround {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmarkround:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmarkround:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmarkround:after {
    top: 5px;
	left: 5px;
	width: 5px;
	height: 5px;
	border-radius: 50%;
	background: white;
}
</style>

    <div class="row">
        <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading" style="font-weight:bold;">
                Add {{$gateway['name']}}
                <a class="pull-right btn btn-default" style="margin-top:-6px;"><i class="fa fa-question-circle"></i>&nbsp;Help</a>
            </div>
        </div>
        </div>
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    {{$gateway['name']}} Credentials
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                        <label for="merchant_id">Merchant ID<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Merchant ID">
                        </div>
                        
                        <div class="col-md-12 form-group">
                        <label for="public_key">Public Key<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Public Key">
                        </div>
                        
                        <div class="col-md-12 form-group">
                        <label for="private_key">Private Key<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Private Key">
                        </div>
                        
                        <div class="col-md-12 form-group">
                        <label for="merchant_account_id">Merchant Account ID<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Merchant Account ID">
                        </div>
                        
                        <div class="col-md-12">
                            <a class="btn btn-primary">Save</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    Gateway Status
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                           <label class="container">Enabled
                            <input type="radio"  name="radio">
                                <span class="checkmarkround"></span>
                                </label>
                                 <label class="container">Disabled
                                 <input type="radio"  name="radio">
                                <span class="checkmarkround"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
         <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    Accept Credit Card Types
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                           <p>Select the credit card types your payment gateway and merchant account are configured to accept.</p>
                           <hr>
                        </div>
                        <div class="col-md-12">
                            <label class="container">Visa 
                            <input type="checkbox">
                             <span class="checkmark"></span>
                             </label>
                              <label class="container">MasterCard
                            <input type="checkbox">
                             <span class="checkmark"></span>
                               </label>
                              <label class="container">American Express 
                            <input type="checkbox">
                             <span class="checkmark"></span>
                               </label>
                              <label class="container">Discover 
                            <input type="checkbox">
                             <span class="checkmark"></span>
                               </label>
                              <label class="container">JCB  
                            <input type="checkbox">
                             <span class="checkmark"></span>
                               </label>
                              <label class="container">Diners Club 
                            <input type="checkbox">
                             <span class="checkmark"></span>
                           </label>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    Accepted Currencies
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                           <p>To accept more than one currency with this gateway, you will need to open multiple accounts with the payment gateway.</p>
                           <hr>
                        </div>
                        <div class="col-md-12">
                            <label for="currencies">Currencies</label>
                            <select class="form-control">
                                <option value="USD">United State Dollars</option>
                                <option value="RS">Pakistani Rupee</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <a class="btn btn-primary">Add Payment Gateway</a> <a class="btn btn-default" href="{{ url()->previous() }}">Cancel</a>
        </div>
        
    </div>
    	
@endsection

@section('scripts')
<script>
    
</script>

@endsection
