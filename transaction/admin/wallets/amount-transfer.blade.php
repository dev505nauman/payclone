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


/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}

</style>

    <div class="row">
        <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading" style="padding:40px;">
                <h3 style="display:inline;">{{$bank_account['name']}}</h3><a href="{{url()->previous()}}" class="float-right" title="Go Back" style="display:inline;position: relative;bottom: 30px;left: 25px;"><i class="fa fa-arrow-left"></i></a>
                <h4 class="float-right" style="display:inline;">Availabe Balance &nbsp; <span style="font-size:25px;font-weight:800;">{{$bank_account['balance']}}$</span></h4>
               </div>
        </div>
        </div>
        <!--<div class="col-md-8">-->
        <!--    <div class="panel">-->
        <!--        <div class="panel-heading">-->
        <!--          <h4>Edit Bank Account</h4>-->
        <!--        </div>-->
        <!--        <div class="panel-body">-->
        <!--            <div class="row">-->
        <!--                <form action="{{route('account-edit')}}" method="post" enctype="multipart/form-data">-->
        <!--                    @csrf-->
        <!--                    <div class="col-md-12 bars">-->
        <!--                      <label for="old">Name</label>-->
        <!--                      <input type="hidden" name="id" value="{{$bank_account['id']}}">-->
        <!--                        <input type="text" id="name" value="{{$bank_account['name']}}" class="form-control" name="name" required="">-->
        <!--                      </div>-->
        <!--                      <div class="col-md-12 bars">-->
        <!--                          <label for="new">Bank Account Number</label>-->
        <!--                          <input type="text" id="account" class="form-control" value="{{$bank_account['account']}}" name="account" required="">-->
        <!--                      </div>-->
        <!--                      <div class="col-md-12 bars">-->
        <!--                          <label for="confirmNew">Routing Number</label>-->
        <!--                          <input type="text" id="routing" class="form-control" value="{{$bank_account['routing']}}" name="routing" required="">-->
        <!--                      </div>-->
        <!--                      <div class="col-md-12 bars">-->
        <!--                          <label for="confirmNe">Address</label>-->
        <!--                          <input type="text" id="address" class="form-control" value="{{$bank_account['address']}}" name="address">-->
        <!--                      </div>-->
        <!--                      <div class="col-md-4 bars">-->
        <!--                          <label for="confirmNew">City</label>-->
        <!--                          <input type="text" id="routing" class="form-control" value="{{$bank_account['city']}}" name="city">-->
        <!--                      </div>-->
        <!--                      <div class="col-md-4 bars">-->
        <!--                          <label for="confirmNew">State</label>-->
        <!--                          <input type="text" id="state" class="form-control" value="{{$bank_account['state']}}" name="state">-->
        <!--                      </div>-->
        <!--                      <div class="col-md-4 bars">-->
        <!--                          <label for="confirmNew">Zip</label>-->
        <!--                          <input type="text" id="zip" class="form-control" value="{{$bank_account['zip']}}" name="zip">-->
        <!--                      </div>-->
        <!--                      <dic class="col-md-12">-->
        <!--                          <div class="form-group photoShow"><br>-->
        <!--                    <label for="photo">Your Photo/Logo</label>-->
        <!--                    <div> <img id="picture" src="#" alt="your image"/> </div>-->
        <!--                </div>-->
        <!--                <div class="form-group">-->
        <!--                    <label for="photo_upload">Upload a new Photo/Logo</label>-->
        <!--                    <input type="file" name="bankLogo" onchange="photo_upload(this)" class="form-control col-3">-->
        <!--                </div>-->
        <!--                      </dic>-->
                        
        <!--                    <div class="col-md-12">-->
        <!--                        <button class="btn btn-primary">Save</button>-->
        <!--                    </div>-->
        <!--                </form>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Transfer Amount To Reward Card</h4>
                </div>
                 <div class="panel-body">
                    <div class="row">
                        <form action="{{route('voucher-transfer')}}" method="post">
                            @csrf
                            <div class="col-md-12 form-group">
                            <label>Select Reward Card</label>
                               <select class="form-control" name="voucher">
                                   @foreach($voucher as $voucher)
                                   <option value="{{$voucher->id}}">{{$voucher->name}}</option>
                                   @endforeach
                               </select>
                            </div>
                            <input type="hidden" name="bankName" value="{{$bank_account['name']}}">
                            <div class="col-md-12 form-group">
                              <label for="routing">Amount</label>
                                <div class="input-group">
                                    <input type="text" id="amount" class="form-control" name="amount" required>
                                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                </div>
                          </div>
                        
                            <div class="col-md-12">
                                <button class="btn btn-primary">Transfer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Transfer Amount To Bank Account</h4>
                </div>
                 <div class="panel-body">
                    <div class="row">
                        <form action="{{route('bank-transfer')}}" method="post">
                            @csrf
                            <div class="col-md-12 form-group">
                            <label>Select Bank Account</label>
                            <select class="form-control" name="account">
                                @foreach($accounts as $account)
                                <option value="{{$account->id}}">{{$account->name}}</option>
                                @endforeach
                            </select>
                               
                            </div>
                            <input type="hidden" name="bankId" value="{{$bank_account['id']}}">
                            <div class="col-md-12 form-group">
                              <label for="routing">Amount</label>
                                <div class="input-group">
                                    <input type="text" id="amount" class="form-control" name="amount" required>
                                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                </div>
                          </div>
                        
                            <div class="col-md-12">
                                <button class="btn btn-primary">Transfer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    	
@endsection

@section('scripts')
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>

function photo_upload(input) {
     $(".photoShow").show();
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#picture')
                    .attr('src', e.target.result)
                    .width(50)
                    .height(20);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
$(document).ready(function(){
     $(".photoShow").hide();
    //$("#amount").inputmask("9999");
    $("#zip").inputmask("99999");
    $("#account").inputmask("999999999");
    $("#routing").inputmask("9999999");
    
    
});
</script>

@endsection
