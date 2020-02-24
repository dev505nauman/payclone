<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>@yield('pagename')</title>
 <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}">
     
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

  <link rel="stylesheet" href="{{asset('style.css')}}">

  <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">


  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
  
  <!-- DATA TABLES-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   
   <!-- GRAPHS-->
 <link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />

<body>
<div class="container">
   <div style="width:fit-content; margin:0px auto;"> <img class="img-responsive" src="{{asset('assets/img/fluxpay-logo.png')}}"> </div>
<h1 class="text-center"> Fill Out the form </h1>
   <div class="panel panel-headline" style="width:50%; margin:0px auto;">
        <div class="panel-body">
            <form action="{{url('http://payclone.dev505.io/public/submitCustomerPayment')}}" id="transaction" class="cardform" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$batchMain['id']}}" name="userId">
            <div class="row">
                <div class="col-md-12 bars">
                      <label for="fname">Select Payment Type</label>
                      <select class="form-control" id="paymentType" onchange="getPaymentSelection(this)">
                          <option value="card" selected>Card Payment</option>
                          <option value="paypal">Paypal Payment</option>
                          <option value="stripe">Stripe Payment</option>
                      </select>
                </div>
            </div>
                <div class="row" id="formSelection"> <!-- Div Start For form selection Replace Form Here With Jquery -->
                    <h3 class="col-md-12">Card Details</h3>
                        <div class="col-md-12">
                            <label for="fname">Name On Card</label>
                            <input type="text" class="form-control"  name="cardName">
                        </div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <label for="c_number">Card Number</label>
                            <input type="text" class="form-control" name="cardNumber">
                        </div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <label for="fname">Card Expiry</label>
                            <input type="text" class="form-control" name="cardExpiry">
                        </div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <label for="c_number">Card CVV Code</label>
                            <input type="text" class="form-control" name="cardCvv">
                        </div>
                </div> <!-- Div End For form selection -->
                <div class="row">
                    <h3 class="col-md-12">Personal Detail</h3>
                        <div class="col-md-12">
                            <label for="action">Action</label>
                            <input type="text" class="form-control" name="action" id="action">
                        </div>
                        <div class="col-md-6" style="margin-top:10px;">
                            <label for="action">Transaction Type</label>
                                <select class="form-control" name="trans_type" id="trans_type">
                                    <option value="sale">Sale</option>
                                    <option value="verification">Verification</option>
                                </select>
                        </div>
                        <div class="col-md-6" style="margin-top:10px;">
                            <label for="action">Auth Type</label>
                                <select class="form-control" name="auth_type" id="auth_type">
                                    <option value="authCapture">Auth And Capture</option>
                                    <option value="authOnly">Auth Only</option>
                                </select>
                        </div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <label for="processed_by">Processed By</label>
                            <input type="text" class="form-control" name="processed_by" id="process">
                        </div>
                        <div class="col-md-12" style="margin-top:10px;">
                              <label for="amount">Amount</label>
                              <input type="number" class="form-control" name="amount" value="{{$batchMain['amount']}}" id="amount" readonly>
                        </div>
                </div>
                <div class="row">
                <h3 class="col-md-12"> Billing Detail </h3>
                    <div class="col-md-12">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" name="fname" value="{{$batch['fname']}}" id="fname">
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" value="{{$batch['lname']}}" name="lname" id="lname">
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="{{$batch['email']}}" name="email" id="email">
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">
                        <label for="addr">Address</label>
                        <textarea class="form-control" name="addr" id="address" value="{{$batch['address']}}" style="resize:none; height:10em;"></textarea>
                    </div>
                    <div class="col-md-4" style="margin-top:10px;">
                        <label for="addr">City</label>
                        <input type="text" class="form-control" name="city" id="city" required>
                    </div>
                    <div class="col-md-4" style="margin-top:10px;">
                        <label for="addr">State</label>
                        <input type="text" class="form-control" name="state" id="state" required>
                    </div>
                    <div class="col-md-4" style="margin-top:10px;">
                        <label for="addr">Zip</label>
                        <input type="text" class="form-control" name="zip" id="zip" required>
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">
                        <label for="addr">Transaction Description</label>
                        <textarea class="form-control" name="tDescription" id="tDescription" value="{{$batch['description']}}" style="resize:none; height:10em;"></textarea>
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">
                        <img src="" id="signHere" hidden>
                        <input type="hidden" id="digitalSign" name="digitalSign">
                    </div>
                </div>
                <div class="col-md-12" id="signButton" style="margin-top:10px;">
                <b>Digital Signature:</b> <a onclick="signWindow()" style="border-bottom:1px solid black;text-decoration:none;padding-bottom:2px;cursor:pointer;">Click here to sign</a>
                 <button type="button" class="btn btn-primary float-right" onclick="formProcess()">Process</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="signature-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Digital Signature Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
      </div>
      <div class="modal-footer">
        <button id="save" class="btn btn-success">Save</button>
        
        <button id="clear" class="btn btn-default">Clear</button>

      </div>
 
    </div>
  </div>
</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
  <script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')}}"></script>
<script>//href="{{url('sign-transaction')}}"
 function getPaymentSelection(ele){
    var stripeHtml = '';
    $('#formSelection').empty();
         
    if($(ele).val() == 'stripe'){
        stripeHtml='<h3 class="col-md-12">Payment Details</h3><div class="col-md-12"><label for="fname">Stripe Account Id</label><input type="text" class="form-control"  name="stripeId"></div>';
        $('#formSelection').html(stripeHtml).css({'color':'','margin-top':'','margin-left':''});
    }if($(ele).val() == 'card'){
        stripeHtml='<h3 class="col-md-12">Card Details</h3><div class="col-md-12"><label for="fname">Name On Card</label><input type="text" class="form-control"  name="cardName"></div><div class="col-md-12" style="margin-top:10px;"><label for="c_number">Card Number</label><input type="text" class="form-control" name="cardNumber"></div><div class="col-md-12" style="margin-top:10px;"><label for="fname">Card Expiry</label><input type="text" class="form-control" name="cardExpiry"></div><div class="col-md-12" style="margin-top:10px;"><label for="c_number">Card CVV Code</label><input type="text" class="form-control" name="cardCvv"></div>';
        $('#formSelection').html(stripeHtml).css({'color':'','margin-top':'','margin-left':''});
    }if($(ele).val() == 'paypal'){
        $('#formSelection').html('This Payment Option Is Not Available Right Now').css({'color':'red','margin-top':'10px','margin-left':'10px'});
    }

     
} //Function Closes Here

var signaturePad = '';

    function signWindow(){
        $('#signature-modal').modal('show');
         signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
           
          backgroundColor: 'rgba(255, 255, 255, 0)',
          penColor: 'rgb(0, 0, 0)'
        });
        
        var saveButton = document.getElementById('save');
        var cancelButton = document.getElementById('clear');
    }
    
    $('#save').click(function (event) {
          var data = signaturePad.toDataURL('image/png');
         $('#signHere').attr('src',data).removeAttr('hidden');
         $('#digitalSign').val(data);
         $('#signature-modal').modal('toggle');
    });
     
 $('#clear').click(function (event) {
            console.log('test');
          signaturePad.clear();
        });
        
        
    function formProcess(){
        //alert("Hello");
        if($('#signHere').attr('src')== ''){
            alert('Please Sign The Document');
        }else{
        
        $('#transaction').submit();
        }
    }
      

</script>
</body>
</html>