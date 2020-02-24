@extends('layouts.admin')

@section('pagename')
Terminal
@endsection

@section('content')
<style>
    .cardwidth{
        width:98%!important ;
    }
    .notes{
        width: 100%;
    height: 52px;
        border: 1px solid #eaeaea;
    background-color: #fbfbfb;
    }
    
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<!--  <nav aria-label="breadcrumb">-->
<!--  <ol class="breadcrumb">-->
<!--    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>-->
<!--    <li class="breadcrumb-item active" aria-current="page">Terminal</li>-->
<!--  </ol>-->
<!--</nav>-->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- First Card -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Customer Lookup</h3>
                    <input type="text" class="form-control" placeholder="Search Here">
                </div>
            </div>    
            <!-- Second Card -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Transaction Details</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-outline-primary" style="padding: 10px 125px;border: 1px solid #00a0f0;background: transparent;color: #00a0f0;">Quick charge</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" style="padding: 10px 125px;">Quick charge</button>
                        </div>
                    </div>
                    <div class="row" style="margin:10px 0px;">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>Amount or Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                <tr style="height:35px;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr style="height:35px;">
                                    <td colspan="4"></td>
                                </tr>
                                <tr style="height:35px;">
                                    <td></td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr style="height:35px;">
                                    <td></td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr style="height:40px;border-top: hidden;">
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
             <!-- Third Card -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Frequency</h3>
                </div>
                <div class="panel-body">
                    <div class="row" style="margin:0px 0px 30px; ">
                        <div class="col-md-6">
                            <button class="btn btn-outline-primary text-center" style="padding: 10px 130px;border: 1px solid #00a0f0;background: transparent;color: #00a0f0;">Single</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary text-center" style="padding: 10px 130px;">Recurring</button>
                        </div>
                    </div>
                    <div class="row form-group" style="margin:0px 0px 30px;">
                        <div class="col-md-6">
                            <label class="col-md-4 col-form-label">Start Date</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Prorate First Payment</label>
                            <label class="switch">
                              <input type="checkbox" checked>
                              <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row form-group" style="margin:0px 0px 30px;">
                        <div class="col-md-6">
                            <label class="col-md-4 col-form-label">Repeat Billing Every</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control float-right">
                        </div>
                    </div>
                    <div class="row form-group" style="margin:0px 0px 30px;">
                        <div class="col-md-6">
                            <label class="col-md-4 col-form-label">Terminate</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control float-right">
                        </div>
                    </div>
                    <div class="row form-group" style="margin:0px 0px 30px;">
                        <div class="col-md-9">
                            <label class="col-md-3 col-form-label">Plan Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Save</label>
                            <label class="switch">
                              <input type="checkbox" checked>
                              <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    
                </div>
            </div>
             <!-- Fourth Card -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Authorization</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary" style="padding: 10px 130px;border: 1px solid #00a0f0;background: transparent;color: #00a0f0;">Pre Auth</button></br>
                        <span>Customer Authorization Already Obtained</span>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" style="padding: 10px 130px;">Post Auth</button></br>
                        <span>Send Request For Customer Authorization</span>
                    </div>
                
                </div>
            </div>
            <!-- Fifth Card -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Adjustment Rules</h3>
                </div>
                <div style="margin-left:25px;">
                    <h4>Card <span class="caret"></span></h4></br>
                    <h4>ACH <span class="caret"></span></h4></br>
                    <input type="checkbox"> Activate adjustment for this payment
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <small>Rules</small>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Percent</label>
                           <label class="switch">
                              <input type="checkbox" checked>
                              <span class="slider round"></span>
                            </label>
                            <label>Dollar</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <small>Disclaimer</small>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <small>Invoice Description</small>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Sixth Card -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Customer Info</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <small>Name On Account</small>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                           <small>Name On Account</small>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                           <small>Address</small>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <small>City</small>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                           <small>State</small>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <small>Postal Code</small>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <small>Phone</small>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <small>Email</small>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="checkbox"> Store Customer Profile
                        </div>
                    </div>
                </div>
            </div>
             <!-- Seventh Card -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Message</h3>
                    <textarea class="form-control" rows="3" placeholder="Type Message Here"></textarea>
                </div>
            </div>  
        </div>
        <div class="col-md-4">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Order Summary</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label style="font-weight:800">Customer</label>
                        </div>
                        <div class="col-md-6">
                            <label class="float-right" style="font-weight:800">Reciept</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div style="margin-left:15px;">
                                <label>John Smith</label></br>
                                <label>John@gmail.com</label></br>
                                <label>(850) 101-7025</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                            <label class="switch">
                              <input type="checkbox" checked>
                              <span class="slider round"></span>
                            </label>
                            </br>
                            <label class="switch">
                              <input type="checkbox" checked>
                              <span class="slider round"></span>
                            </label>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-8">
                            <label style="font-weight:800">Transaction Detail</label>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-6">
                            <div style="margin-left:15px;">
                                <label>Tshirt</label></br>
                                <label>Painting</label></br>
                                <label>Haircut</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right" style="text-align:right;">
                                <label>$10.00</label></br>
                                <label>$125.00</label></br>
                                <label>$29.00</label>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-6">
                            <div style="margin-left:15px;">
                                <label>Sales Tax</label>
                                <label class="float-right">7%</label></br>
                                <label>Shipping</label></br>
                                <label>Tip</label></br>
                                <label style="font-weight:800">Total Amount</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right" style="text-align:right;">
                                <label>$11.48</label></br>
                                <label>$0.00</label></br>
                                <label>$10.00</label></br>
                                <label style="font-weight:800">$185.48</label>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-6">
                            <div style="margin-left:15px;">
                                <label>Discount</label>
                                <label class="float-right">1%</label></br>
                                <label>Surcharge</label></br>
                                <label style="font-weight:800">Total Charge</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right" style="text-align:right;">
                                <label>($1.85)</label></br>
                                <label>$0.00</label></br>
                                <label style="font-weight:800">$183.63</label></br>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-8">
                            <label style="font-weight:800">Payment Info</label>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-8">
                                <label>ACH:</label>
                                <label class="float-right">**** **** **** 7845</label></br>
                                <label>Bank:</label>
                                <label class="float-right">Bank Of America</label></br>
                                <label>Acc:</label>
                                <label class="float-right">Checking</label></br>
                        </div>
                        <div class="col-md-4">
                                <label>Card Image</label>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-right">
                                <button class="btn btn-primary">Request Authorization</button>&nbsp;&nbsp;
                                <button class="btn btn-outline-primary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')


@endsection
