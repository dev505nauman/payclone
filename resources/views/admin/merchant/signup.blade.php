@extends('layouts.admin')

@section('pagename')
Merchant Signup
@endsection

@section('content')
 
  <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Merchant Signup</h3>
        </div>
        <div class="panel-body">
            <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Personal Information</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Personal Address</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">Beneficiary Information</p>
                </a></li>
                 <li class="disabled"><a href="#step-4">
                    <h4 class="list-group-item-heading">Step 4</h4>
                    <p class="list-group-item-text">Account Information</p>
                </a></li>
            </ul>
        </div>
    </div>
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1> STEP 1</h1>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="First Name" name="firstname">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Last Name" name="lastname">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="mm/dd/yyyy" name="dob">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Enter your 9 digit SSN" name="ssn">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Email" name="email">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Phone Number(mor)" name="phone_no">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Phone Number(eve)" name="phone_no">
                    </div>
                    </div>
                <button id="activate-step-2" class="btn btn-primary btn-lg">Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="text-center"> STEP 2</h1>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Address" name="addr">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="State" name="state">
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Residence City" name="city">
                    </div>
                    
                    <div class="col-md-4">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="ZIP" name="zip">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Residence Country" name="country">
                    </div>
                    
                    </div>
                <button id="activate-step-3" class="btn btn-primary btn-lg">Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="text-center"> STEP 3</h1>
                 <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Title" name="benificiary_title">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Percentage Value" name="benificiary_per_val">
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary First Name" name="ben_fname">
                    </div>
                    
                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Last Name" name="ben_lname">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Date of Birth" name="ben_dob">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Social Security Number" name="ben_ssn">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Email" name="ben_email">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Address" name="ben_addr">
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary State" name="ben_state">
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary City" name="ben_city">
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary ZIP" name="ben_zip">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Beneficiary Country" name="ben_country">
                    </div>
                    
                    </div>
                 <button id="activate-step-4" class="btn btn-primary btn-lg">Next</button>
            </div>
        </div>
    </div>
     <div class="row setup-content" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="text-center"> STEP 4</h1>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Bank Name" name="bank_name">
                    </div>
                    
                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Account Name" name="account_name">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Account Number" name="account_no">
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Account Country Code" name="account_cc">
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Routing Number" name="routing_no">
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Account Type" name="account_type">
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control merchant_form_inputs" placeholder="Account Ownership" name="account_ownership">
                    </div>
                <button class="btn btn-primary btn-lg">Submit</button>
            </div>
        </div>
    </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
<script>
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
