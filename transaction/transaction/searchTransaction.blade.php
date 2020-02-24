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
    <li class="breadcrumb-item active" aria-current="page">Batches</li>
  </ol>
</nav>

<div class="panel panel-headline">
        <div class="panel-body">
                
    <h2>Search Transactions</h2>
    <h4 style="background:#e1e1e1; padding:10px;"> Period & Amount</h4>
     
     <div class="container" style="width:50%; margin:0px auto;">
         <div class="col-md-6">
             <label>Date From To</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Amount</label>
             <input type="text" class="form-control">
         </div>
        
     </div>
     
     
    <h4 style="background:#e1e1e1; padding:10px;"> Customer Info</h4>
    
     <div class="container" style="width:50%; margin:0px auto;">
         <div class="col-md-6">
             <label>First Name</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Last Name</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Company</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Customer ID</label>
             <input type="text" class="form-control">
         </div>
        
     </div>
     
    <h4 style="background:#e1e1e1; padding:10px;"> Transaction Detail</h4>
    
    <div class="container" style="width:50%; margin:0px auto;">
         <div class="col-md-6">
             <label>Invoice Or PO</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Last Four Digits</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Approval Code</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Transaction ID</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Action</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Status</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Method</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Account</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>User</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Service</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Signature Status</label>
             <input type="text" class="form-control">
         </div>
         <div class="col-md-6">
             <label>Payment Type</label>
             <input type="text" class="form-control">
         </div>
        
     </div>
     
     <div class="col-md-12 text-center"><button class="btn btn-Success" style="margin-top:20px; background:#52c852; border: 1px solid #52c852; color:white"> SEARCH </button></div>
   
  
                  
              </div>
        </div>
        
        </div>

@endsection
@section('scripts')


 <script src="{{asset('/js/card.js')}}"></script>

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
    var modalProcessing3 = '<div class="container-fluid" style="width:90%;"><div class="modal-content"><div class="modal-header"  style="background-color:#41B314;"><h5 class="modal-title text-center" style="color:white; font-size:30px; letter-spacing:5px;">Step 3</h5></div><div class="modal-body" style="margin-top:50px;"><h3 class="lead">Payment successful! Thankyou for choosing payclone</h3><center><p>Signature Here</p><div class="wrapper"><canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas></div></div><div class="progress pl-2 pr-2" style="margin:100px 0px;"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%" >100%</div></div></div></div></div>';

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