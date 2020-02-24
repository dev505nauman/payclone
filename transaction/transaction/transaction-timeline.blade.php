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
                
    <h2>All Transactions</h2>
     <h4 style="background:#e1e1e1; padding:10px;"> Current Settled Transactions</h4>
    <table class="table table-responsive">
    <thead style="background:#e1e1e1;">
        <tr>
            <th></th>
            <th></th>
            <th>
                Transaction No.
            </th>
            <th>
               Location
            </th>
            <th>
                Date
            </th>
            <th>
                Method
            </th>
            <th>
                Name
            </th>
            <th>
                Payment Type
            </th>
            <th>
                Card No.
            </th>
            <th>
                Amount
            </th>
            <th>
                Auth Code
            </th>
            <th>
                Status
            </th>
        </tr>
        
    </thead>
    <tbody>
        @foreach($today as $todayy)
        <tr>
            <td width='3%'><span class="fa fa-eye"></span></td>
            <td>Trans 00{{$todayy->id}}</td>
            <td>{{$todayy->location}}</td>
            <td>{{$todayy->date}}$</td>
            <td>{{$todayy->method}}</td>
            <td>{{$todayy->name}}</td>
            <td>{{$todayy->paymentType}}</td>
            <td>{{$todayy->last4}}</td>
            <td>{{$todayy->amount}}</td>
            <td>{{$todayy->authCode}}</td>
            <td>{{($todayy->status==1)?'Approved':'Pending'}}</td>
        </tr>
        @endforeach
    </tbody>
    <!--<thead>-->
    <!--    <tr>-->
    <!--        <th>Total</th>-->
    <!--        <th>-->
                
    <!--        </th>-->
    <!--        <th>-->
    <!--            {{$sum}}.00$-->
    <!--        </th>-->
    <!--        <th>-->
    <!--            {{$charge}}.00$-->
    <!--        </th>-->
    <!--        <th>-->
    <!--            0.00$-->
    <!--        </th>-->
    <!--        <th>-->
    <!--            0.00$-->
    <!--        </th>-->
    <!--        <th>-->
    <!--           {{$charge}}.00$-->
    <!--        </th>-->
    <!--        <th style="font-weight:400;">-->
    <!--            <a href="#">View Report</a>-->
    <!--        </th>-->
    <!--    </tr>-->
        
    <!--</thead>-->
    </table>
    
    <h4 style="background:#e1e1e1; padding:10px; margin-top:30px;"> Previously Settled Transactions</h4>
    
    <div> <button style="border:1px solid #e1e1e1; background:transparent; color:#8282fd">All Actions</button> <button style="border:1px solid #e1e1e1; background:transparent; color:#8282fd;">All Dates</button></div>
    
    <table class="table table-responsive" style="margin-top:10px;">
    <thead style="background:#e1e1e1;">
        <tr>
            <th></th>
            <th>
                Transaction No.
            </th>
            <th>
               Location
            </th>
            <th>
                Date
            </th>
            <th>
                Method
            </th>
            <th>
                Name
            </th>
            <th>
                Payment Type
            </th>
            <th>
                Card No.
            </th>
            <th>
                Amount
            </th>
            <th>
                Auth Code
            </th>
            <th>
                Status
            </th>
        </tr>
        
    </thead>
    <tbody>
        @if($all)
        @foreach($all as $allPayments)
        <tr>
            <td width='3%'><span class="fa fa-eye"></span></td>
            <td>Trans 00{{$allPayments->id}}</td>
            <td>{{$allPayments->location}}</td>
            <td>{{$allPayments->date}}$</td>
            <td>{{$allPayments->method}}</td>
            <td>{{$allPayments->name}}</td>
            <td>{{$allPayments->paymentType}}</td>
            <td>{{$allPayments->last4}}</td>
            <td>{{$allPayments->amount}}</td>
            <td>{{$allPayments->authCode}}</td>
            <td>{{($allPayments->status==1)?'Approved':'Pending'}}</td>
        </tr>
        @endforeach
        @else <tr><td colspan="7" class="text-center" style=" font-weight:400;">
               No Previous Payments
            </td></tr>
        @endif
        
    </tbody>
    </table>
                  
              </div>
        </div>
        
        </div>
        
        <!--<div class="row">-->

  <!-- Nav tabs -->
  <!--<div class="nav navbar" style="margin-bottom:0px; border:none;border-radius:0px; background-color:#00aaff; color:white; font-size:25px; font-weight:400; letter-spacing:3px; padding:5px 30px 0px; ">Batches</div>-->
  
  <!--  <div class="container-fluid" style="margin-top:10px;">-->
  <!--   <div class="nav navbar" style="border:none;border-radius:0px; background-color:grey; color:black; font-size:15px; font-weight:400; padding:5px 30px 0px; ">Current Unsettled Batches</div>-->
    
  <!--      <table class="table table-responsive">-->
  <!--          <thead>-->
  <!--              <tr>-->
  <!--                  <th>Heading 1</th>-->
  <!--                  <th>Heading 2</th>-->
                    
  <!--                  <th>Heading 3</th>-->
                    
  <!--              </tr>-->
  <!--          </thead>-->
  <!--          <tbody>-->
  <!--              <tr>-->
  <!--                  <td>test data</td>-->
  <!--                  <td>test data</td>-->
  <!--                  <td>test data</td>-->
                    
  <!--              </tr>-->
  <!--          </tbody>-->
  <!--      </table>-->
        
  <!--  </div>-->

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