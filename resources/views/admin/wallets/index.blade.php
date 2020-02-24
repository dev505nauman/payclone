@extends('layouts.admin')

@section('pagename')
Payment Gateways
@endsection

@section('content')

<style>

.swal2-container.swal2-center {
    align-items: flex-start !important;
}
.swal2-modal{
           margin:0px !important;
           margin-top:100px !important;
           width:60em;
}
.swal2-content {
    font-size:18px;
}
.swal2-header .swal2-title {
    font-size:40px;
}
.swal2-confirm .swal2-styled{
    padding 10px 40px;
}
.lia {
        
    list-style-type: none;
    /* display: flex; */
    margin-right: 20px;
    margin-bottom: 15px;
    background-color: #fff;
    padding: 10px 39px;
    min-height: 130px;
    display: flex;
    align-items: center;
    justify-content: center ;
    position:relative;
    
    -webkit-box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
-moz-box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
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
    <div class="row-fluid">
    	<div class="span12">
      		<div class="widget-box">
      		   
      		   
    <div class="widget-title" style="margin-bottom:50px;">
        			<span class="icon">
        				<i class="icon-align-justify"></i>
        			</span>
          			<h3 style="display:inline;">Bank Accounts</h3><a data-toggle="modal" onclick="addBankAccount()" data-target="#addBankAccount" class="btn btn-primary float-right" style="display:inline;"> Add Bank Account</a>
        		</div>
        		</div>
        		
		        <div class="widget-content nopadding">
		            <div class="row">
		                <ul class="res" >
		                @if($bank!=null)
		                    @foreach($bank as $bk)
		                   <li class="lia">
		                  <a href="{{route('account-edit-page', ['id' => $bk['id']])}}">
		                      @if($bk['picture'] != '' || $bk['picture'] != null)
		                      <img src="{{asset('images/bank_logo/'.$bk['picture'])}}"style="width:100px;height:40px;margin-top:20px;">
		                      @else
		                      <img src="{{asset('images/bank_logo/no-image.png')}}" style="width:100px;height:40px;margin-top:20px;">
		                      @endif
		                        <h4 class="text-center">{{$bk['account']}}</h4>
		                </a>
		                <div style="position:absolute;right:10px;top:10px;">
		                    <a href="{{route('account-edit-page', ['id' => $bk['id']])}}" title="Edit Bank"><i class="fa fa-pencil" style="color:#ffe000;"></i></a>
		                    <a href="{{route('amount-transfer-page', ['id' => $bk['id']])}}" title="Batches"><i class="fa fa-exchange" style="color:blue;"></i></a>
	    		            &nbsp;<a onclick="confirmBankDelete({{$bk['id']}})"><i class="fa fa-trash" style="color:red;" title="Remove Bank Account"></i></a>
		              </div> 
		                </li>
		                    
		                
		                    @endforeach
		                @endif
		                </ul>
		            </div>
	    		</div>
	    		
	    		<div style="margin-bottom:30px;"><h3 style="display:inline;">Reward Cards</h3><button data-toggle="modal" data-target="#addVoucher" class="btn btn-primary float-right">Add Reward Card</button></div>
	    		
	    		<div class="widget-content nopadding">
		            <div class="row">
		                <ul class="res" >
		               @if($voucher!=null)
		                    @foreach($voucher as $vouchers)
		                   <li class="lia">
		                  <a onclick="viewWallet({{$vouchers->id}})" title="View Transaction History">
		                        <h3 class="text-center" style="color:black;">{{$vouchers['name']}}</h3>
		                        
		                </a>
		                <div style="position:absolute;right:10px;top:10px;">
		                    <a onclick="viewWallet({{$vouchers->id}})" title="View Transaction History"><i class="fa fa-eye" style="color:green;"></i></a>
	    		            &nbsp;<a onclick="msgViewModal({{$vouchers->id}},0)" title="Remove Card"><i class="fa fa-trash" style="color:red;"></i></a>
	    		            &nbsp;<a onclick="msgViewModal({{$vouchers->id}},1)" title="Transfer Amount"><i class="fa fa-exchange" style="color:blue;"></i></a>
		              </div>      
		                
		                    @endforeach
	    		                @endif
		                </ul>
		            </div>
	    		</div>
	    		
	    		<div style="margin-bottom:30px;"><h3 style="display:inline;">Batch Account Setting</h3></div>
	    		<p id="percentage-msg" class="text-danger text-left" style="margin-top: -30px;"></p>
	    		
	    		<div class="widget-content nopadding">
	    		    <div class="container-fluid">
	    		    @foreach($bank as $banks)
	    		    <h4>Bank Name: {{$banks->name}}</h4>
	    		    <div class="input-group" style="width:30%; margin-bottom:10px;">
                      <input type="text" onChange="amountDivide()" id="box{{$loop->iteration}}" class="form-control" placeholder="Set Amount Percentage For Bank">
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                     <input type="hidden" id="bid{{$loop->iteration}}" value="{{$banks->id}}">
	    		    @endforeach
	    		    @foreach($voucher as $voucherCount)
	    		    <h4>Reward Card: {{$voucherCount->name}}</h4>
	    		    <div class="input-group" style="width:30%; margin-bottom:10px;">
                      <input type="text" onChange="amountDivide()" id="vou{{$loop->iteration}}" class="form-control" placeholder="Set Amount Percentage For Reward Card">
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                    <input type="hidden" id="vid{{$loop->iteration}}" value="{{$voucherCount->id}}">
	    		    @endforeach
	    		    <input type="hidden" id="totalBank" value="{{$totalBank}}">
	    		    <input type="hidden" id="totalVou" value="{{$totalVou}}">
	    		    <button class="btn btn-primary" onclick="amountDivide()">Save</button>
	    		    </div>
	    		</div>
	    		
    	</div>
    	
   	</div>
   	
   	<!-- Modal Code Start Bank Account -->

<div class="modal fade" id="addBankAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Add Bank Account</h4>
      </div>
     <form method="post" action="{{route('addBank')}}" enctype="multipart/form-data">
        @csrf
        <!--Fix Hidden Balance-->
        <input type="hidden" value="2000" class="form-control" name="balance">
        
        @if(Auth::user()->role_id == 1)
             <div class="col-md-12 bars">
              <label>Select Name</label>
                <select name="name" class="form-control" id="allUser">
                    <option value=""></option>
                </select>
              </div>
        @else
            <div class="col-md-12 bars">
              <label for="old">Name</label>
                <input type="text" id="name" class="form-control" name="name" required>
              </div>
        @endif
              <div class="col-md-12 bars">
                  <label for="new">Bank Account Number</label>
                  <input type="text" id="account" class="form-control" name="account" required>
              </div>
              <div class="col-md-12 bars">
                  <label for="confirmNew">Routing Number</label>
                  <input type="text" id="routing" class="form-control" name="routing" required>
              </div>
              <div class="col-md-12 bars">
                  <label for="confirmNe">Address</label>
                  <input type="text" id="address" class="form-control" name="address">
              </div>
              <div class="col-md-4 bars">
                  <label for="confirmNew">City</label>
                  <input type="text" id="routing" class="form-control" name="city">
              </div>
              <div class="col-md-4 bars">
                  <label for="confirmNew">State</label>
                  <input type="text" id="state" class="form-control" name="state">
              </div>
              <div class="col-md-4 bars">
                  <label for="confirmNew">Zip</label>
                  <input type="text" id="zip" class="form-control" name="zip">
              </div>
              
              <div class="col-md-12">
                  <label for="photo">Percentage Amount</label>
                  <div class="input-group">
                        <input type="text" class="form-control" name="bank_percent" placeholder="Percentage amount that will go into this account from batch" required>
                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
              </div>
              
              <div class="col-md-12 bars" >
                  <div class="form-group photoShow"><br>
                            <label for="photo">Your Photo/Logo</label>
                            <div> <img id="picture" src="#" alt="your image"/> </div>
                        </div>
                        <div class="form-group">
                            <label for="photo_upload">Upload a new Photo/Logo</label>
                            <input type="file" name="bankLogo" onchange="photo_upload(this)" class="form-control col-3">
                        </div>
              </div>
              
        <div class="modal-footer">
        <p class="alert alert-primary" style="display:block !important;float:left;padding: 5px;"><i class="fa fa-lock text-warning"></i> &nbsp; All your information is safe and secure</p>  
       <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal Code Ends Here -->


	<!-- Modal Code Start Vouchers -->

<div class="modal fade" id="addVoucher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Add New Reward Card</h4>
      </div>
     <form method="post" action="{{route('addVoucher')}}">
        @csrf
        
            <div class="col-md-12 bars">
              <label for="name">Card Name</label>
                <input type="text" id="name" class="form-control" name="name" required>
              </div>
              <div class="col-md-12 bars">
                  <label for="cardNumber">Card Number</label>
                  <input type="number" id="cardNumber" class="form-control" name="voucher" required>
              </div>
              <div class="col-md-12 bars">
                  <label for="routing">Percentage Amount</label>
                    <div class="input-group">
                        <input type="text" id="amount" class="form-control" name="amount" placeholder="Percentage amount that will go into this card from batch" required>
                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
              </div>
              
      <div class="modal-footer">
          
       <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal Code Ends Here -->

	<!-- Modal Code Transfer Wallet -->

<div class="modal fade" id="transfer-wallet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Transfer Amount</h4>
      </div>
      <form method="post" action="{{route('wallet-amount-transfered')}}">
          @csrf
      <div class="modal-body">
          <div class="container-fluid">
              <div class="row" style="margin-bottom:25px;">
                  <p style="display:inline;font-size:x-large;">Total Balance</p>
                  <p style="display:inline; float:right;font-size:xx-large;color:darkgray;" id="Transferamount"></p>
                  
              </div>
              <input type="hidden" id="oldWallet" name="oldWallet">
          </div>
          <select class="form-control" id="allWallet" name="newWallet">
          </select>
      </div>
              
      <div class="modal-footer">
        <button id="transferFundsButton" type="submit" class="btn btn-success">Transfer</button> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal Code Ends Here -->

	<!-- Modal Code Start Vouchers -->

<div class="modal fade" id="transferHistory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Transfer History</h4>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
              <div class="row" style="margin-bottom:25px;">
                  <p style="display:inline;font-size:x-large;">Total Balance</p>
                  <p style="display:inline; float:right;font-size:xx-large;color:darkgray;" id="totalAmount"></p>
                  
              </div>
          </div>
          <table class="table table-responsive">
              <thead>
                  <tr>
                  <th>Bank Name</th>
                  <th>Amount Transferred</th>
                  <th>Date Of Transfer</th>
                  </tr>
              </thead>
              <tbody id="wallet-history">
                  
              </tbody>
          </table>
      </div>
              
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>


	<!-- Modal Code start COnfirm Message -->

<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" style="color:red;"></i> &nbsp; Warning</h4>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
              <div class="row" style="margin-bottom:25px;">
                  <p id="confirmMsg" style="display:inline;"></p>
                  <input type="hidden" id="vid">
              </div>
          </div>
      </div>
              
      <div class="modal-footer">
        <button id="confirmMsgButton" type="button" class="btn btn-danger">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal Code Ends Here -->


<!-- Modal Code start COnfirm Bank Delete Message -->

<div class="modal fade" id="confirmBankDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" style="color:red;"></i> &nbsp; Warning</h4>
      </div>
      <form action="{{route('delete-bank')}}" method="post">
          @csrf
      <div class="modal-body">
          <div class="container-fluid">
              <div class="row" style="margin-bottom:25px;">
                  <p style="display:inline;font-size:18px;">Confirm Bank Delete?</p>
                  <input type="hidden" id="bankId" name="id">
              </div>
          </div>
      </div>
              
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal Code Ends Here -->
@endsection

@section('scripts')
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
function gatewayChange()
{
	var value = $('#add_gateway option:selected').text();
	if(value=='Propay')
	{
		$('.addPayProName').parent().next().show();
	}
	else
	{
		$('.addPayProName').parent().next().hide();
	}
	$('.addPayProName').html(value);
}

function viewWallet(id){
    
    $.ajax({
        url:"{{route('get-transaction-history')}}",
        type: 'get',
        data:{
            'id':id,
            'flag':0,
        },
        success: function (data){
            console.log(data);
            $('#totalAmount').text(data['value']+'$');
           var html='';
            $.each(data['data'] ,function(i,v){
            html+="<tr><td>"+v['bank_name']+"</td><td>"+v['amount']+"</td><td>"+v['date']+"</td></tr>";
            });
            
            $('#wallet-history').empty();
            $('#wallet-history').append(html);
            $('#transferHistory').modal('show');
        }
        
    });

    
}

function removeWallet(){
   var id =  $('#vid').val();
    $.ajax({
        url:"{{route('get-transaction-history')}}",
        type: 'get',
        data:{
            'id': id,
            'flag':1,
        },
        success: function (data){
            $('#confirmDelete').modal('toggle');
            if(data['data'] == 'success'){
                Swal.fire(
                  'Deleted',
                  'Card Deleted Successfully!!',
                  'success'
                ).then((result) => {
                  location.reload();
                });
                
              }else if(data['value'] != null || data['value'] != ''){
              Swal.fire(
                  'Error',
                  'You Cannot Delete This Card, Please Transfer Your Amount To Other Card.',
                  'error'
                  
                )
            }else alert("Try Again!");
        
        }
        
    });

}

function transferWallet(){
   var id =  $('#vid').val();
    $.ajax({
        url:"{{route('get-transfer-information')}}",
        type: 'get',
        data:{
            'id': id,
        },
        success: function (data){
            $('#oldWallet').val(data['myVoucher'][0]['id']);
            if(data['sum'] == 0){
                 $('#Transferamount').css({'font-size':'22px'},{'margin-top':'10px'}).text("Insufficient Balance");
                 $('#transferFundsButton').hide();
            }else{
                $('#Transferamount').text(data['sum']+'$');
                $('#transferFundsButton').show();
            }
            var html='';
            $.each(data['allVoucher'] ,function(i,v){
            html+="<option value="+v['id']+">"+v['name']+"</option>";
            });
            $('#allWallet').empty();
            if(html == ''){
            $('#allWallet').replaceWith("<p>No Wallets Available To Transfer Amount</p>");
            $('#transferFundsButton').hide();
            }else
            $('#allWallet').append(html);
            $('#transfer-wallet').modal('show');
        }
    });

}

function msgViewModal(a,flag){
    //flag=1 for transfer flag=0 for delete
    $('#vid').val(a);
    $('#confirmDelete').modal('show');
    if(flag==0){
        $('#confirmMsg').text('Are You Sure You Want To Remove This Card? This Card May Contain Amount In It.');
        document.getElementById('confirmMsgButton').onclick=removeWallet;
    }
    else{ //flag == 1 ,here transfer code
        $('#confirmMsg').text('Are You Sure You Want To Transfer All Amount To Other Card?');
        document.getElementById("confirmMsgButton").onclick = function() {
              $('#confirmDelete').modal('toggle');
              transferWallet();
            };
    }
}

function confirmBankDelete(a){
    $('#bankId').val(a);
    $('#confirmBankDelete').modal('show');
}

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
    
    function addBankAccount() {
        $.ajax({
        url:"{{route('get-user-information')}}",
        type: 'get',
        success: function (data){
            console.log(data);
            var html='';
            $.each(data['user'] ,function(i,v){
            html+="<option value="+v['id']+">"+v['fname']+"</option>";
            });
            console.log(html);
            $('#allUser').empty();
            if(html == ''){
            $('#allUser').replaceWith("<p>No Users Available</p>");
            }else
            $('#allUser').append(html);
            $('#addBankAccount').modal('show');
        }
    });
    }

$(document).ready(function() {
    $(".photoShow").hide();
    $("#cardNumber").inputmask("9999999");    
    // $("#amount").inputmask("9999");    
    $("#account").inputmask("999999999");
    $("#routing").inputmask("9999999");
    $("#zip").inputmask("99999"); 
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
      //  $(this).remove();
    })  

    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        //$(this).remove();
    })    

     $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        //$(this).remove();
    })    
});

function amountDivide(){
    var totalBank = $('#totalBank').val();
    var totalVou = $('#totalVou').val();
    var bank = new Array();
    var bankid = new Array();
    
    var vou = new Array();
    var vouid = new Array();
    
    var sum = Number(0);
    
   for(var i=1; i<=totalBank; i++){ 
        bank.push($('#box'+i).val());
        bankid.push($('#bid'+i).val());
   }    
   
    for(var i=1; i<=totalVou; i++){ 
        vou.push($('#vou'+i).val());
        vouid.push($('#vid'+i).val());
    }
    
    $.each(bank , function( index, value ){
    sum = sum += Number(value);
    });
    
     $.each(vou , function( index, value ){
        sum += Number(value);
    });

    if(sum > 100){
        $('#percentageBtn').attr('disabled',true);
        $('#percentage-msg').text('Please Enter Appropriate Value, Sum Of All Numbers Should Not Exceed 100%');
    }
    
    else if(sum < 100){
        $('#percentageBtn').attr('disabled',true);
        $('#percentage-msg').text('Please Enter Appropriate Value, Sum Of All Numbers Should Not Less Than 100%');
    }
    else{
        $('#percentageBtn').attr('disabled',false);
        $('#percentage-msg').text('');
    }
    
    
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "{{route('save-wallet-percentage')}}",
        dataType: 'json',
        data:{
            'bankPercent':bank,
            'bankId':bankid,
            'voucherPercent':vou,
            'voucherid':vouid,
        },
        success: function (data){
            if(data['data'] == 'success'){
            var a = $('#message').fadeIn().attr('class','alert alert-info').text('Percentage Saved Successfully');
            setTimeout(function() { 
              $('#message').fadeOut('class','').text('');
            },3000);
        }
        }
    });

    
    
}
</script>

@endsection
