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
                <li class="breadcrumb-item"><a href="http://payclone.dev505.io/public/batches">Batch</a></li>
                <li class="breadcrumb-item active" aria-current="page">Batch Description</li>
            </ol>
        </nav>
        <div class="col-md-6">
            <div class="panel panel-headline">
                <div class="panel-heading">Batch Information</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <label>Batch Created By</label>
                            <p>{{$batchData['fname'].$batchData['lname']}}</p>
                        </div>
                        <div class="row">
                            <label>Email</label>
                            <p>{{$batchData['email']}}</p>
                        </div>
                        <div class="row">
                            <label>Address</label>
                            <p>{{$batchData['address']}}</p>
                        </div>
                        <div class="row">
                            <label>City</label>
                            <p>{{$batchData['city']}}</p>
                        </div>
                        <div class="row">
                            <label>State</label>
                            <p>{{$batchData['state']}}</p>
                        </div>
                        <div class="row">
                            <label>Zip</label>
                            <p>{{$batchData['zip']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-headline">
                <div class="panel-heading">Batch Information</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <label>Batch Description</label>
                            <p>{{$batchData['description']}}</p>
                        </div>
                        <div class="row">
                            <label>Batch Type</label>
                            <p>{{$batchData['type']}}</p>
                        </div>
                        <div class="row">
                            <label>Transaction Type</label>
                            <p>{{$batch['transactionType']}}</p>
                        </div>
                        <div class="row">
                            <label>Auth Type</label>
                            <p>{{$batch['authType']}}</p>
                        </div>
                        <div class="row">
                            <label>Processed By</label>
                            <p>{{$batch['processedBy']}}</p>
                        </div>
                        <div class="row">
                            <label>Total Batch Amount</label>
                            <p>{{$batch['amount']}}</p>
                        </div>
                        <div class="row">
                            <label>Action</label>
                            <p>{{$batch['action']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">Batch Detail</div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Transferred To</th>
                                <th>Amount Transferred</th>
                                <th>Date Of Transfer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction as $trans)
                                <tr>
                                    <td>{{$trans->transactionTo}}</td>
                                    <td>{{round($trans->amount,2)}}</td>
                                    <td>{{$trans->date}}</td>
                                </tr>
                            @endforeach
                      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        
  
@endsection