
<style>
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
    
    -webkit-box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
-moz-box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
        
    }
</style>
    <div class="row-fluid">
    	<div class="span12">
      		<div class="widget-box">
        		<div class="widget-title">
        			<span class="icon">
        				<i class="icon-align-justify"></i>
        			</span>
          			<h3>Payment Gateways</h3>
        		</div>
		        <div class="widget-content nopadding">
		            <div class="row">
		                <ul class="res" >
		                @if($gateways!=null)
		                    @foreach($gateways as $gateway)
		                    
		                    <li class="lia">
		                  <a href="{{route('add-gateway', ['id' => $gateway['id']])}}">
		                    
		                           <img src="{{ asset('images/gateways/'.$gateway['logo']) }}" style="width:100px;">
		                      
		                    </a>
		                </li>
		                
		                    @endforeach
		                @endif
		                </ul>
		            </div>
	
		  <!--      	<div class="row">-->
		  <!--      		<div class="col-md-4">-->
			 <!--       		<div class="panel panel-headline">-->
			 <!--       			<div class="panel-heading">-->
			 <!--           			<h3 class="panel-title">Sync Payment Processor</h3>-->
			 <!--       			</div>-->
				<!--        		<div class="panel-body">-->
				<!--            		<div class="row">-->
				<!--            			<div class="col-md-12 form-group">-->
				<!--            				<label for="payment_gateway">Payment Gateway</label>-->
				<!--            				<select class="form-control" name="payment_gateway" id="add_gateway" onchange="gatewayChange();">-->
				<!--            					<option value="">Choose Gateway</option>-->
				<!--            					<option value="stripe">Stripe</option>-->
				<!--            					<option value="propay">Propay</option>-->
				<!--            				</select>-->
				<!--            			</div>-->
				<!--            			<div class="col-md-12">-->
				<!--            				<button class="btn btn-primary" style="float:right;">Add</button>-->
				<!--            			</div>-->
				<!--            		</div>-->
				<!--        		</div>-->
			 <!--   			</div>-->
			 <!--   		</div>-->
			 <!--   		<div class="col-md-8">-->
			 <!--   			<div class="panel panel-headline">-->
			 <!--       			<div class="panel-heading">-->
			 <!--           			<h3 class="panel-title">Synced Processors</h3>-->
			 <!--       			</div>-->
				<!--        		<div class="panel-body">-->
				<!--            		<div class="row">-->
				<!--            			<div class="col-md-12">-->
				<!--            				<table></table>-->
				<!--            			</div>-->
				<!--            		</div>-->
				<!--        		</div>-->
			 <!--   			</div>-->
			 <!--   		</div>-->
			 <!--   		<div class="col-md-12">-->
			 <!--   			<div class="panel panel-headline">-->
			 <!--       			<div class="panel-heading">-->
			 <!--           			<h3 class="panel-title addPayProName"></h3>-->
			 <!--       			</div>-->
				<!--        		    <div class="panel-body" style="display:none;">-->
    <!--        <div class="row form-group">-->
    <!--    <div class="col-xs-12">-->
    <!--        <ul class="nav nav-pills nav-justified thumbnail setup-panel">-->
    <!--            <li class="active"><a href="#step-1">-->
    <!--                <h4 class="list-group-item-heading">Step 1</h4>-->
    <!--                <p class="list-group-item-text">Personal Information</p>-->
    <!--            </a></li>-->
    <!--            <li class="disabled"><a href="#step-2">-->
    <!--                <h4 class="list-group-item-heading">Step 2</h4>-->
    <!--                <p class="list-group-item-text">Personal Address</p>-->
    <!--            </a></li>-->
    <!--            <li class="disabled"><a href="#step-3">-->
    <!--                <h4 class="list-group-item-heading">Step 3</h4>-->
    <!--                <p class="list-group-item-text">Beneficiary Information</p>-->
    <!--            </a></li>-->
    <!--             <li class="disabled"><a href="#step-4">-->
    <!--                <h4 class="list-group-item-heading">Step 4</h4>-->
    <!--                <p class="list-group-item-text">Account Information</p>-->
    <!--            </a></li>-->
    <!--        </ul>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<form method="post" action="{{ route('signup-merchant-post') }}">-->
    <!--    @csrf-->
    <!--<div class="row setup-content" id="step-1">-->
    <!--    <div class="col-xs-12">-->
    <!--        <div class="col-md-12 well text-center">-->
    <!--            <h1> STEP 1</h1>-->
    <!--            <div class="row">-->
    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="First Name" name="firstname" value="{{Auth::user()->fname}}">-->
    <!--                </div>-->
    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Last Name" name="lastname" value="{{Auth::user()->lname}}">-->
    <!--                </div>-->
    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="mm/dd/yyyy" name="dob">-->
    <!--                </div>-->
    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Enter your 9 digit SSN" name="ssn">-->
    <!--                </div>-->
    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Email" name="email" value="{{Auth::user()->email}}">-->
    <!--                </div>-->
    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Phone Number" name="phone_no" value="{{Auth::user()->phone_no}}">-->
    <!--                </div>-->
                   
    <!--                </div>-->
    <!--            <a id="activate-step-2" class="btn btn-primary btn-lg">Next</a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="row setup-content" id="step-2">-->
    <!--    <div class="col-xs-12">-->
    <!--        <div class="col-md-12 well text-center">-->
    <!--            <h1 class="text-center"> STEP 2</h1>-->
    <!--            <div class="row">-->
    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Address" name="addr" value="{{Auth::user()->address}}">-->
    <!--                </div>-->
    <!--                <div class="col-md-4">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="State" name="state" value="{{Auth::user()->state}}">-->
    <!--                </div>-->

    <!--                <div class="col-md-4">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Residence City" name="city" value="{{Auth::user()->city}}">-->
    <!--                </div>-->
                    
    <!--                <div class="col-md-4">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="ZIP" name="zip" value="{{Auth::user()->zip}}">-->
    <!--                </div>-->
    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Residence Country" name="country">-->
    <!--                </div>-->
                    
    <!--                </div>-->
    <!--            <a id="activate-step-3" class="btn btn-primary btn-lg">Next</a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="row setup-content" id="step-3">-->
    <!--    <div class="col-xs-12">-->
    <!--        <div class="col-md-12 well text-center">-->
    <!--            <h1 class="text-center"> STEP 3</h1>-->
    <!--             <div class="row">-->
    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Title" name="benificiary_title">-->
    <!--                </div>-->
    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Percentage Value" name="benificiary_per_val">-->
    <!--                </div>-->

    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary First Name" name="ben_fname">-->
    <!--                </div>-->
                    
    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Last Name" name="ben_lname">-->
    <!--                </div>-->
    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Date of Birth" name="ben_dob">-->
    <!--                </div>-->

    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Social Security Number" name="ben_ssn">-->
    <!--                </div>-->

    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Email" name="ben_email">-->
    <!--                </div>-->

    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Address" name="ben_addr">-->
    <!--                </div>-->

    <!--                <div class="col-md-4">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary State" name="ben_state">-->
    <!--                </div>-->

    <!--                <div class="col-md-4">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary City" name="ben_city">-->
    <!--                </div>-->

    <!--                <div class="col-md-4">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary ZIP" name="ben_zip">-->
    <!--                </div>-->

    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Country" name="ben_country">-->
    <!--                </div>-->
                    
    <!--                </div>-->
    <!--             <a id="activate-step-4" class="btn btn-primary btn-lg">Next</a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- <div class="row setup-content" id="step-4">-->
    <!--    <div class="col-xs-12">-->
    <!--        <div class="col-md-12 well text-center">-->
    <!--            <h1 class="text-center"> STEP 4</h1>-->
    <!--            <div class="row">-->
    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Bank Name" name="bank_name">-->
    <!--                </div>-->
                    
    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Account Name" name="account_name">-->
    <!--                </div>-->
    <!--                <div class="col-md-12">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Account Number" name="account_no">-->
    <!--                </div>-->

    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Account Country Code" name="account_cc">-->
    <!--                </div>-->

    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Routing Number" name="routing_no">-->
    <!--                </div>-->

    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Account Type" name="account_type">-->
    <!--                </div>-->

    <!--                <div class="col-md-6">-->
    <!--                    <input type="text" class="form-control merchant_form_inputs" placeholder="Account Ownership" name="account_ownership">-->
    <!--                </div>-->
    <!--            <button class="btn btn-primary btn-lg" type="submit">Submit</button>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--    </div>-->
    <!--</form>-->
    <!--</div>-->
			 <!--   		</div>-->
				<!--	</div>-->
		  <!--      </div>-->
    		</div> 
    	</div>
   	</div>

@section('scripts')
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

$(document).ready(function() {
    
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
</script>

@endsection
