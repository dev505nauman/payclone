@extends('layouts.admin')

@section('pagename')
Account Settings
@endsection

@section('content')


<div class="container" style="width:100%;">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://payclone.dev505.io/public/home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Terminal</li>
  </ol>
</nav>
        
        <div class="row">

  <!-- Nav tabs -->
  <div class="nav navbar" style="margin-bottom:0px; border:none;border-radius:0px; background-color:#00aaff; color:white; font-size:25px; font-weight:400; letter-spacing:3px; padding:5px 15px 0px; ">New Transaction</div>
  
  <form action="{{url('transaction_submit')}}" id="transaction" class="cardform" method="POST">
      @csrf
  
  <ul class="nav nav-tabs cardUlTab col-md-12" id="customSelected" role="tablist" style="background-color:#0092da; border:none;">
    <li role="presentation" data-id="1" class="active col-md-4 cardTab"><a href="#cardtab" aria-controls="home" role="tab" data-toggle="tab" class="text-center">Card</a></li>
    <li role="presentation" data-id="2" class="col-md-4 cardTab" ><a href="#ACH" aria-controls="profile" role="tab" data-toggle="tab" class="text-center">ACH</a></li>
    <li role="presentation" data-id="3" class="col-md-4 cardTab" ><a href="#Terminal" aria-controls="messages" role="tab" data-toggle="tab" class="text-center">Smart Terminal</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="cardtab">   <!--   1st Tab Start-->
    
    <div class="seacrh-col" style="display:none">
    <div class="row">
     <div class="col-md-12">
         <div class="panel panelt">
           <h3 style="margin-left:8px">Your Transactions <a href="#" class="close-col" style="margin-left: 80px;">x</a>  </h3> 
           <p style="background-color:lightgray;color:white">Today,Nov26 2019</p>
           <ul>
            <li>Charge <P style="float:right">10:31pm</p><p style="float:right;padding-right:8px; color:red">$99.00</P></li>
            <li>Charge <P style="float:right">10:31pm</p><p style="float:right;padding-right:8px; color:red">$99.00</P></li>
            <li>Charge <P style="float:right">10:31pm</p><p style="float:right;padding-right:8px; color:red">$99.00</P></li>
            <li>Charge <P style="float:right">10:31pm</p><p style="float:right;padding-right:8px; color:red">$99.00</P></li>
            <li>Charge <P style="float:right">10:31pm</p><p style="float:right;padding-right:8px; color:red">$99.00</P></li>
            <li>Charge <P style="float:right">10:31pm</p><p style="float:right;padding-right:8px; color:red">$99.00</P></li>
            <li>Charge <P style="float:right">10:31pm</p><p style="float:right;padding-right:8px; color:red">$99.00</P></li>
            <li>Charge <P style="float:right">10:31pm</p><p style="float:right;padding-right:8px; color:red">$99.00</P></li>
            <li>Charge <P style="float:right">10:31pm</p><p style="float:right;padding-right:8px; color:red">$99.00</P></li>
            
               
       
           </ul>
        </div>
        </div>
        </div>
        </div>
    <div class="panel panel-headline" style="margin-top:50px; width:50%; margin:50px auto 0px;">
     
     
        <div class="panel-body">
              <a class="btn advanced-search-btn btn-primary" style="float:right; margin-top:20px">Show daily transactions</a>
      <div class="row">

          <div class="col-md-6">
              <div class="row">
          
              <h2 class="col-md-12">Payment Information </h2>
                  <div class="col-md-12 bars">
                      <label for="fname">Name On Card</label>
                      <input type="text" class="form-control" id="name" value="Yusuf MUTLU" name="name">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="c_number">Card Number</label>
                      <input type="text" class="form-control" id="cardnumber" value="4546 65xx xxxx xxxx" name="number">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="expiry">Expiry</label>
                      <input type="text" class="form-control" name="expiry" id="expiry" value="02/2022" placeholder="MM/YY">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="cvc">CVV</label>
                      <input type="text" class="form-control" name="cvc" id=cvv placeholder="cvc">
                  </div>
                   
              </div>

    </div>
    
     <div class="col-md-6">
         
          <div style="margin-top:80px;">
                <div class="card-wrapper"></div>
          </div>
    </div>
    
    </div>
    
          <div class="row">
          <h2 class="col-md-12"> Transaction </h2>
          <div class="col-md-12 bars">
              <label for="action">Action</label>
              <input type="text" class="form-control" name="action" id="action">
          </div>
          <div class="col-md-6 bars">
              <label for="action">Transaction Type</label>
                <select class="form-control" name="trans_type" id="trans_type">
                    <option value="sale">Sale</option>
                    <option value="verification">Verification</option>
                </select>
          </div>
          <div class="col-md-6 bars">
              <label for="action">Auth Type</label>
                <select class="form-control" name="auth_type" id="auth_type">
                    <option value="authCapture">Auth And Capture</option>
                    <option value="authOnly">Auth Only</option>
                </select>
          </div>
          <div class="col-md-12 bars">
              <label for="processed_by">Processed By</label>
              <input type="text" class="form-control" name="processed_by" id="process">
          </div>
          <div class="col-md-6 bars">
              <label for="amount">Amount</label>
              <input type="number" class="form-control" name="amount" id="amount">
          </div>
          <div class="col-md-6 bars">
              <label for="action">Amount Type</label>
                <select class="form-control" name="amountType" id="auth_type">
                    <option value="0" selected>One Time Only</option>
                    <option value="1">Subscription</option>
                </select>
          </div>
          </div>
 <div class="row">
<h2 class="col-md-12"> Billing Contact </h2>
</div>
<div class="row">
    <div class="col-md-12 bars">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" name="fname" id="fname">
    </div>
    
    <div class="col-md-12 bars">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" name="lname" id="lname">
    </div>
    <div class="col-md-12 bars">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="col-md-12 bars">
        <label for="addr">Address</label>
        <textarea class="form-control" name="addr" id="address" style="resize:none; height:10em;"></textarea>
    </div>
    <div class="col-md-4 bars">
        <label for="addr">City</label>
        <input type="text" class="form-control" name="city" id="city">
    </div>
    <div class="col-md-4 bars">
        <label for="addr">State</label>
        <input type="text" class="form-control" name="state" id="state">
    </div>
    <div class="col-md-4 bars">
        <label for="addr">Zip</label>
        <input type="text" class="form-control" name="zip" id="zip">
    </div>
    <div class="col-md-12 bars">
        <label for="addr">Transaction Description</label>
        <textarea class="form-control" name="tDescription" id="tDescription" style="resize:none; height:10em;"></textarea>
    </div>
    
</div>

<!--<div class="row col-md-12 text-center">-->
<!--<a class="btn btn-primary" onClick="sumbitModal()" style="padding:10px 100px; margin:10px 100px; background-color: ##00AAFF; color: white; font-weight: 400; ">Process</a>-->
<!-- </div>-->
 
    </div>
    </div>
   
       
   
    
    </div>   <!--   1st Tab End-->
    
    
    <div role="tabpanel" class="tab-pane" id="ACH"> <!--   2nd Tab Start--> 
    
    <div class="panel panel-headline" style="margin-top:50px; width:50%; margin:50px auto 0px;">
        <div class="panel-body">
    
              <div class="row">
          <form id="paymentForm" action="{{url('transaction-form')}}" method="Post" class="cardform">
    <h2 class="col-md-12">Transaction details</h2>
                  <!--<div class="col-md-12 bars">-->
                  <!--    <label for="fname">Account type</label>-->
                  <!--    <input type="text" class="form-control" id="ach-acount-type"  name="accountType">-->
                  <!--</div>-->
                  <!--<div class="col-md-12 bars">-->
                  <!--    <label for="c_number">Transaction type</label>-->
                  <!--    <input type="text" class="form-control" id="ach-transaction-type" name="transactionType">-->
                  <!--</div>-->
                  
                   <!--<h2 class="col-md-12">Transaction</h2>-->
                  <!--<div class="col-md-12 bars">-->
                  <!--    <label for="fname">Action</label>-->
                  <!--    <input type="text" class="form-control" id="ach-action" name="action">-->
                  <!--</div>-->
                  <div class="col-md-6 bars">
                      <label for="c_number">Amount</label>
                      <input type="text" class="form-control" id="ach-amount" name="amount">
                  </div>
                  <div class="col-md-6 bars">
                    <label for="action">Amount Type</label>
                        <select class="form-control" name="amountType" id="auth_type">
                            <option value="0" selected>One Time Only</option>
                            <option value="1">Subscription</option>
                        </select>
                  </div>
                  <!-- <div class="col-md-12 bars">-->
                  <!--    <label for="c_number">purchase order</label>-->
                  <!--    <input type="text" class="form-control" id="ach-purchase" name="purchase">-->
                  <!--</div>-->
                  <div clss="row">
                   <div class="col-md-12">
                      <label for="c_number">invoice #</label>
                        <div class="input-group">
                            <span class="input-group-addon">inv</span>
                            <input type="text" class="form-control" id="ach-invoice" name="invoice">
                        </div>
                  </div>
                  </div>
                   <!--<h2 class="col-md-12">Billing Contact</h2>-->
                  <!--<div class="col-md-12 bars">-->
                  <!--    <label for="fname">First Name</label>-->
                  <!--    <input type="text" class="form-control" name="fname" id="ach-fname">-->
                  <!--</div>-->
                  <!--<div class="col-md-12 bars">-->
                  <!--    <label for="lname">Last Name</label>-->
                  <!--    <input type="text" class="form-control"name="lname" id="ach-lname">-->
                  <!--</div>-->
                  <div class="col-md-12 bars">
                      <label for="lname">Email</label>
                      <input type="email" class="form-control"name="email" id="ach-email">
                  </div>
                <!--  <div class="col-md-12 bars">-->
                <!--    <label for="addr">Address</label>-->
                <!--    <textarea class="form-control" name="address" id="ach-address"></textarea>-->
                <!--</div>-->
                  <div class="col-md-12 bars">
                    <label for="addr">Transaction Description</label>
                    <textarea class="form-control" name="tDescription" id="ach-description"></textarea>
                </div>
                
                      
            </form>
        
              </div>

           
        <!--    <div class="row text-center">-->
        <!--    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalCard">Click here</button>-->
        <!--</div>-->
        
        </div>
       
    </div>
    </div> <!--   2nd Tab Ends Here--> 
    
    
     <div role="tabpanel" class="tab-pane" id="Terminal"> <!--   3rd Tab Start--> 
    
    <div class="panel panel-headline" style="margin-top:50px; width:50%; margin:50px auto 0px;">
        <div class="panel-body">
                
              <div class="row">
    <h2 class="col-md-12">Transaction</h2>
                  <div class="col-md-12 bars">
                      <label for="amount">Amount</label>
                      <input type="text" class="form-control"  name="amount" id="smart-amount">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="invoice">Invoice</label>
                      <input type="text" class="form-control" name="invoice" id="smart-invoice">
                  </div>
                  
                   <h2 class="col-md-12">Billing Contact</h2>
                  <div class="col-md-12 bars">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" name="fname" id="smart-fname">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control"name="lname" id="smart-lname">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="lname">Email</label>
                      <input type="email" class="form-control"name="email" id="smart-email">
                  </div>
                  <div class="col-md-12 bars">
                    <label for="addr">Address</label>
                    <textarea class="form-control" name="address" id="smart-address"></textarea>
                </div>
                  <div class="col-md-12 bars">
                    <label for="addr">Transaction Description</label>
                    <textarea class="form-control" name="tDescription" id="smart-description"></textarea>
                </div>
              </div>
              
    <!--<div class="col-md-12 text-center">-->
    <!--        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalCard" style="text-transform:uppercase;font-weight:bold;">Request Payment</button>-->
    <!--        </div>-->
        </div>
        
        </div>
    </div> <!--   3rd Tab Ends Here--> 
    
    
     
  </div>
  <div class="modal-footer" style="text-align:center;"><button type="button" onclick="sumbitModal()" class="btn btn-primary p-3">Process</button></div>
  </form>
  
<!-- Modal Code Starts -->

<div class="modal fade" id="modalCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="container-fluid" style="width:90%;">
            <div class="modal-content">
                <div class="modal-header"  style="background-color:#5bc0de;">
                    <h5 class="modal-title text-center" style="color:white; font-size:30px; letter-spacing:5px;">Step 1</h5>
                </div>
                <div class="modal-body" style="margin-top:50px;">
                    <h3 class="lead"> 
                    Payment approved! generating reciept for the payment
                    </h3>
                <div class="progress pl-2 pr-2" style="margin:100px 0px;">
                    <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%" >60%</div>
                </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Code Ends Here  -->





<!-- Modal Code Starts -->


<!-- Modal Code Starts -->

<div class="modal fade" id="submit_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog process-modal">
    
        <div style="color: white; margin-top: 0px; margin-left: 50px; font-size:25px; text-align:center">
            <p id="processed">Your transaction is beign processed <img src="{{url('images/loadinggif.gif')}}">  </p>
            <p style="font-size:15px; text-align:center" >This will take a while, please be patient .. </p>
        </div>
   
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Code Ends Here  -->







@endsection
@section('scripts')


 <script src="{{asset('/js/card.js')}}"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>-->
<!--<script src="{{asset('/js/sign.js')}}"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>



<script>

  $(document).ready(function(){
      $(".advanced-search-btn").click(function(){
          
          $('.seacrh-col').show(500);
      });
  });
  
  
    $(document).ready(function(){
  $(".close-col").click(function(){    
      $('.seacrh-col').hide(500);
  });
});

 $(document).ready(function(){
    var card = new Card({
      form: '.cardform',
      container: '.card-wrapper' 
    });
    
     $('.jp-card-number').html('4546 65xx xxxx xxxx');
    $('.jp-card-name').html('Test Card');
    $('.jp-card').addClass('jp-card-visa');
    $('.jp-card').addClass('jp-card-identified');
    $('.jp-card-expiry').html('02/2022');
    $('#cardnumber').click();
 })

function sumbitModal(){
    var modalProcessing = '<div class="container-fluid" style="width:90%;"><div class="modal-content"><div class="modal-header"  style="background-color:#5bc0de;"><h5 class="modal-title text-center" style="color:white; font-size:30px; letter-spacing:5px;">Step 1</h5></div><div class="modal-body" style="margin-top:50px;"><h3 class="lead">Waiting for approval from merchant .. </h3><div class="progress pl-2 pr-2" style="margin:100px 0px;"><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%" >30%</div></div></div></div></div>';
    var modalProcessing2 = '<div class="container-fluid" style="width:90%;"><div class="modal-content"><div class="modal-header"  style="background-color:#5bc0de;"><h5 class="modal-title text-center" style="color:white; font-size:30px; letter-spacing:5px;">Step 2</h5></div><div class="modal-body" style="margin-top:50px;"><h3 class="lead">Payment approved! generating reciept for the payment</h3><div class="progress pl-2 pr-2" style="margin:100px 0px;"><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%" >60%</div></div></div></div></div>';
    var modalProcessing3 = '<div class="container-fluid" style="width:90%;"><div class="modal-content"><div class="modal-header"  style="background-color:#41B314;"><h5 class="modal-title text-center" style="color:white; font-size:30px; letter-spacing:5px;">Step 3</h5></div><div class="modal-body" style="margin-top:50px;"><h3 class="lead">Payment successful! Thankyou for choosing payclone</h3><center><p>Signature Here</p><div class="wrapper"><canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas></div><div><button id="clear" class="btn btn-default">Clear</button><button id="save" class="btn btn-success">Save</button></div><div class="progress pl-2 pr-2" style="margin:100px 0px;"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%" >100%</div></div></div></div></div>';
    $('#submit_payment').modal('show');
    
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var ref= $('#customSelected li.active');
      if(ref.attr('data-id') == 1){
            var name = $('#name').val();
            var card = $('#cardnumber').val();
            var exp = $('#expiry').val();
            var cvv = $('#cvv').val();
            var action = $('#action').val();
            var process = $('#process').val();
            var trans_type = $('#trans_type').val();
            var auth_type = $('#auth_type').val();
            var amount = $('#amount').val();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var zip = $('#zip').val();
            var email = $('#email').val();
            var description = $('#tDescription').val();
            $.ajax({
                type: 'POST',
                url: "{{route('chargeTransaction')}}",
                dataType: 'json',
                data: {
                    'name': name,
                    'card': card,
                    'exp':  exp,
                    'cvv': cvv,
                    'auth':auth_type,
                    'trans':trans_type,
                    'action': action,
                    'process': process,
                    'amount': amount,
                    'fname': fname,
                    'lname': lname,
                    'address': address,
                    'city':city,
                    'state':state,
                    'zip':zip,
                    'email': address,
                    'description': description,
                    'type': 'card',
                    
                },
                success: function (data) {
                  if(data['data'] == "success"){
                    setTimeout(function() {
                        $('.modal-dialog').html(modalProcessing);
                      }, 3000);
                      
                      setTimeout(function() {
                         $('.modal-dialog').html(modalProcessing2); 
                      }, 6000);
                      
                      setTimeout(function() {
                        $('.modal-dialog').html(modalProcessing3);
                        
                        
                        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                           
                          backgroundColor: 'rgba(255, 255, 255, 0)',
                          penColor: 'rgb(0, 0, 0)'
                        });
                        
                        console.log(signaturePad);
                        //$('#transaction').submit();
                      }, 9000);
                      
                      
                      
                  }else alert("payment Failed");
                     
            }});
        }
        if(ref.attr('data-id') == 2){ //id="3"
        
             var achamount = $('#ach-amount').val();
            var achinvoice = $('#ach-invoice').val();
            // var achfname = $('#ach-fname').val();
            // var achlname = $('#ach-lname').val();
            var achemail = $('#ach-email').val();
            // var achaddress = $('#ach-address').val();
            var achdescription = $('#ach-description').val();
            //  var achpurchase = $('#ach-purchase').val();
            //   var achaction = $('#ach-action').val();
            //   var achaccountType = $('#ach-account-type').val();
                // var achtransactionType = $('#ach-transaction-type').val();
              
          $('#submit_payment').modal('toggle');
            $.ajax({
                type: 'post',
                url: "{{route('smartTerminalAmount')}}",
                dataType: 'json',
                data: {
                    'invoice': achinvoice,
                    'amount': achamount,
                    // 'fname': achfname,
                    // 'lname': achlname,
                    'email': achemail,
                    // 'address' : achaddress,
                    'desc' : achdescription,
                    // 'purchase':achpurchase,
                    // 'action':achaction,
                    // 'accountType':achaccountType,
                    // 'transactionType':achtransactionType,
                    'type' : 'Smart Terminal',
                },
                success: function (data) {
                  if(data['data'] == "success"){
                    alert("mail sent successfully");
                  }else alert("payment Failed");
                     
            }});
        }
    
}

// $(document).ready(function(){
    
//     $('#signature-pad').sign({
//       resetButton: $('#clear')
//     });
    
// })



//Stripe Functions Start

    $(function() {
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(e.target).closest('form'),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;

    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault(); // cancel on first error
      }
    });
  });
});

$(function() {
  var $form = $("#payment-form");

  $form.on('submit', function(e) {
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
    if (response.error) {
      $('.error')
        .removeClass('hide')
        .find('.alert')
        .text(response.error.message);
    } else {
      // token contains id, last4, and card type
      var token = response['id'];
      // insert the token into the form so it gets submitted to the server
      $form.find('input[type=text]').empty();
      $form.append("<input type='hidden' name='reservation[stripe_token]' value='" + token + "'/>");
      $form.get(0).submit();
    }
  }
})

//Stripe Functions End


</script>

@endsection