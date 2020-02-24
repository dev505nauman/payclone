@extends('layouts.admin')

@section('pagename')
Account Settings
@endsection

@section('content')
 
<style>
    .submit-button {
  margin-top: 10px;
}
.cardTab{
    padding: 0px;
}

.cardUlTab{
    padding:0px;

}
.cardUlTab.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #00aaff !important;
    cursor: default;
     background-color: #f5f5fa !important; 
     border: none; 
     border-bottom-color: none;}
.cardUlTab.nav-tabs>li>a {
    margin-right: 0px;
    line-height: 1.42857143;
    border:none;
    border-radius: 0px 0px 0 0;
    color:white;
}
.cardUlTab.nav-tabs>li {
    float: left;
    margin-bottom: 0px;
}
.process-modal {
  display: flex;
    height: 100%;
    align-items: center;
    margin-bottom: 0px;  
    margin-top: 0px;
}
.bars{
    padding: 15px;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 7px;
    font-weight: 700;
}
</style>

<div class="container" style="width:100%;">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://payclone.dev505.io/public/home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Transactions</li>
  </ol>
</nav>
        
        <div class="row">

  <!-- Nav tabs -->
  <div class="nav navbar" style="margin-bottom:0px; border:none;border-radius:0px; background-color:#00aaff; color:white; font-size:25px; font-weight:400; letter-spacing:3px; padding:5px 15px 0px; ">New Transaction</div>
  <ul class="nav nav-tabs cardUlTab col-md-12" role="tablist" style="background-color:#0092da; border:none;">
    <li role="presentation" class="active col-md-4 cardTab"><a href="#cardtab" aria-controls="home" role="tab" data-toggle="tab" class="text-center">Card</a></li>
    <li role="presentation" class="col-md-4 cardTab" ><a href="#E-Check" aria-controls="profile" role="tab" data-toggle="tab" class="text-center">E-Check</a></li>
    <li role="presentation" class="col-md-4 cardTab" ><a href="#Terminal" aria-controls="messages" role="tab" data-toggle="tab" class="text-center">Smart Terminal</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="cardtab">   <!--   1st Tab Start-->
    
    
    <div class="panel panel-headline" style="margin-top:50px; width:50%; margin:50px auto 0px;">
     
     
        <div class="panel-body">
              
      <div class="row">

          <div class="col-md-6">
              <div class="row">
          <form action="" class="cardform">
    
              <h2 class="col-md-12">Payment Information</h2>
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
                      <input type="text" class="form-control" name="cvc" placeholder="cvc">
                  </div>
                       
            </form>
        
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
              <input type="text" class="form-control" name="action">
          </div>
          <div class="col-md-12 bars">
              <label for="processed_by">Processed By</label>
              <input type="text" class="form-control" name="processed_by">
          </div>
          <div class="col-md-12 bars">
              <label for="amount">Amount</label>
              <input type="number" class="form-control" name="amount">
          </div>
          </div>
 <div class="row">
<h2 class="col-md-12"> Billing Contact </h2>
</div>
<div class="row">
    <div class="col-md-12 bars">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" name="fname">
    </div>
    
    <div class="col-md-12 bars">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" name="lname">
    </div>
    <div class="col-md-12 bars">
        <label for="addr">Address</label>
        <textarea class="form-control" name="addr"></textarea>
    </div>
</div>

<div class="row col-md-12 text-center">
<a class="btn btn-primary" onClick="sumbitModal()" style="padding:10px 100px; margin:10px 100px; background-color: ##00AAFF; color: white; font-weight: 400; ">Process</a>
 </div>
 
    </div>
    </div>
    
    </div>   <!--   1st Tab End-->
    
    
    <div role="tabpanel" class="tab-pane" id="E-Check"> <!--   2nd Tab Start--> 
    
    <div class="panel panel-headline" style="margin-top:50px; width:50%; margin:50px auto 0px;">
        <div class="panel-body">
    
              <div class="row">
          <form action="" class="cardform">
    <h2 class="col-md-12">Account details</h2>
                  <div class="col-md-12 bars">
                      <label for="fname">Account type</label>
                      <input type="text" class="form-control"  name="name">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="c_number">Transaction type</label>
                      <input type="text" class="form-control" name="number">
                  </div>
                  
                   <h2 class="col-md-12">Transaction</h2>
                  <div class="col-md-12 bars">
                      <label for="fname">Action</label>
                      <input type="text" class="form-control" name="name">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="c_number">Amount</label>
                      <input type="text" class="form-control"name="number">
                  </div>
                   <div class="col-md-12 bars">
                      <label for="c_number">purchase order</label>
                      <input type="text" class="form-control"name="number">
                  </div>
                   <div class="col-md-12 bars">
                      <label for="c_number">invoice</label>
                      <input type="text" class="form-control"name="number">
                  </div>
                
                      
            </form>
        
              </div>

           
            <div class="row text-center">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalCard">Click here</button>
        </div>
        
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
                      <input type="text" class="form-control"  name="amount">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="invoice">Invoice</label>
                      <input type="text" class="form-control" name="invoice">
                  </div>
                  
                   <h2 class="col-md-12">Billing Contact</h2>
                  <div class="col-md-12 bars">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" name="fname">
                  </div>
                  <div class="col-md-12 bars">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control"name="lname">
                  </div>
              </div>
              
    <div class="col-md-12 text-center">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalCard" style="text-transform:uppercase;font-weight:bold;">Request Payment</button>
            </div>
        </div>
        
        </div>
    </div> <!--   3rd Tab Ends Here--> 
    
    
     
  </div>
  
  
  
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="{{asset('/js/sign.js')}}"></script>
<script>

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
    var modalProcessing3 = '<div class="container-fluid" style="width:90%;"><div class="modal-content"><div class="modal-header"  style="background-color:#41B314;"><h5 class="modal-title text-center" style="color:white; font-size:30px; letter-spacing:5px;">Step 3</h5></div><div class="modal-body" style="margin-top:50px;"><h3 class="lead">Payment successful! Thankyou for choosing payclone</h3><center><p>Signature Here</p><div class="wrapper"><canvas id="signature-pad" class="signature-pad" width=400 height=200 onclick="signature()"></canvas></div><div><button id="clear" class="btn btn-danger" style="float:right;">Clear</button></div></div><div class="progress pl-2 pr-2" style="margin:100px 0px;"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%" >100%</div></div></div></div></div>';

    $('#submit_payment').modal('show');

  $.ajax({
                type: 'GET',
                url: "{{url('testtransaction')}}",
                dataType: 'json',
                data: {
                    'id': 23
                },
                success: function (data) {
                  console.log("success");
    
                    setTimeout(function() {
                        $('.modal-dialog').html(modalProcessing);
                      }, 3000);
                      
                      setTimeout(function() {
                         $('.modal-dialog').html(modalProcessing2); 
                      }, 6000);
                      
                      setTimeout(function() {
                        $('.modal-dialog').html(modalProcessing3);
                      }, 9000);
                     
                     
            }});
}

$(document).ready(function(){
    
    $('#signature-pad').sign({
      resetButton: $('#clear')
    });
    
})


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