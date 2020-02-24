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
      <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://payclone.dev505.io/public/home">Home</a></li>
                <li class="breadcrumb-item"><a href="http://payclone.dev505.io/public/customers">Customers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Detail</li>
            </ol>
        </nav>
        
        <div class="col-md-12">
            <div class="panel panel-headline">
                <div class="panel-heading" style="font-weight: 800;font-size: x-large;"><p style="display:inline-block;">{{$user['fname'].' '.$user['lname']}}</p><p style="float:right;">${{$total}}.00</p></div>
                
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="panel panel-headline">
                <div class="panel-heading"><b>Customer Information</b></div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                        <p style="display:inline-block;">Name</p><p style="float:right;">{{$user['fname'].' '.$user['lname']}}</p>
                        </div>
                        <div class="row">
                        <p style="display:inline-block;">Nickname</p><p style="float:right;">{{$user['nickname']}}</p>
                        </div>
                        <div class="row">
                        <p style="display:inline-block;">Company Name</p><p style="float:right;">{{$user['companyName']}}</p>
                        </div>
                        <div class="row">
                        <p style="display:inline-block;">Date Of Birth</p><p style="float:right;">{{$user['dob']}}</p>
                        </div>
                        <div class="row">
                        <p style="display:inline-block;">Email</p><p style="float:right;">{{$user['email']}}</p>
                        </div>
                        <div class="row">
                        <p style="display:inline-block;">Phone Number</p><p style="float:right;">{{$user['phone_no']}}</p>
                        </div>
                        <div class="row">
                        <p style="display:inline-block;">Address</p><p style="float:right;">{{$user['address']}}</p>
                        </div>
                        <div class="row">
                        <p style="display:inline-block;">City</p><p style="float:right;">{{$user['city']}}</p>
                        </div>
                        <div class="row">
                        <p style="display:inline-block;">State</p><p style="float:right;">{{$user['state']}}</p>
                        </div>
                        <div class="row">
                        <p style="display:inline-block;">Zip</p><p style="float:right;">{{$user['zip']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-headline">
                <div class="panel-heading"><b>Customer Wallets</b></div>
                <div class="panel-body">
                    <div class="container">
                        @foreach($wallet as $wallets)
                        <div class="row">
                            <p><b>{{$wallets->name}}</b></p>
                        </div>
                        <div class="row">
                            <label>Voucher Number</label>
                            <p>{{$wallets->voucher_nbr}}</p>
                        </div>
                        <div class="row">
                            <label>Amount Percentage from Batch</label>
                            <p>{{$wallets->value}}</p>
                        </div>
                        <div class="row">
                            <label>Amount Percentage from Batch</label>
                            <p>{{$walletsBalance}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-headline">
                <div class="panel-heading"><b>Customer Bank Accounts</b></div>
                <div class="panel-body">
                    <div class="container">
                        @foreach($bank_account as $account)
                        <div class="row">
                            <p><b>{{$account->name}}</b></p>
                        </div>
                        <div class="row">
                            <label>Account Number</label>
                            <p>{{$account->account}}</p>
                        </div>
                        <div class="row">
                            <label>Routing Number</label>
                            <p>{{$account->routing}}</p>
                        </div>
                        <div class="row">
                            <label>City</label>
                            <p>{{$account->city}}</p>
                        </div>
                        <div class="row">
                            <label>Amount Percentage from Batch</label>
                            <p>{{$account->amount_percent}}</p>
                        </div>
                        <div class="row">
                            <label>Total Balance</label>
                            <p>{{$account->balance}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
          <div class="col-md-6">  
            <div class="panel panel-headline">
                <div class="panel-heading"><b>Batches Details</b></div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Total Amount</th>
                                <th>Date Of Transfer</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batch as $batches)
                            <tr>
                                <th><a href="{{route('viewBatchData',['id',$batches-id])}}">{{$batches->amount}}</a></th>
                                <th><a href="{{route('viewBatchData',['id',$batches-id])}}">{{$batches->batchCloseDate}}</a></th>
                                <th><a href="{{route('viewBatchData',['id',$batches-id])}}">{{($batches->status==1)? 'Approved':'pending'}}</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="col-md-6">  
            <div class="panel panel-headline">
                <div class="panel-heading"><b>Seperate Transaction Details</b></div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Transferred To</th>
                                <th>Amount Transferred</th>
                                <th>Date Of Transfer</th>
                                <th>method</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction as $transactions)
                            <tr>
                                <th>{{$transactions->transactionTo}}</th>
                                <th>{{$transactions->amount}}</th>
                                <th>{{$transactions->date}}</th>
                                <th>{{$transactions->method}}</th>
                                <th>{{$transactions->paymentType}}</th>
                                <th>{{($transactions->status==1)? 'Approved':'pending'}}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
        
  
@endsection