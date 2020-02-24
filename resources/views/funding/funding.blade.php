@extends('layouts.admin')

@section('pagename')
Fundings
@endsection

@section('content')
<style>
    
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

 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Fundings</li>
  </ol></nav>
<div class="panel">
    <h3 class="panel-heading" style="display:block;">Apply Searching</h3>
    <div class="panel-body">
        <div class="row col-md-6">
            <label>Date Start</label>
            <div class="input-group">
              <input type="date" class="form-control" id="dateStart" step="0.5" min="1" max="10000" value="0.00" required>
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
            </div>
        <div class="row col-md-6 float-right">
             <label>Date End</label>
            <div class="input-group">
              <input type="date" id="dateEnd" class="form-control" name="amount" step="0.5" min="1" max="10000" value="0.00" required>
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
            </div>
        <div class="row col-md-6" style="margin-top:10px;">
            <label>Amount From</label>
            <div class="input-group">
              <input type="number" class="form-control" id="startAmount" step="0.5" min="1" max="10000" value="0.00">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
            </div>
            </div>
        <div class="row col-md-6 float-right" style="margin-top:10px;">
             <label>Amount To</label>
            <div class="input-group">
              <input type="number" class="form-control" id="endAmount" step="0.5" min="1" max="10000" value="0.00">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
            </div>
            </div>
        </div>
    
    
    <h3 class="panel-heading" style="display:block;">Fundings
  <!--<a class="btn btn-primary pull-right" onclick="dynamicSearch()" style="margin-right:3px;">Search</a>-->
  <a class="btn btn-primary pull-right" style="margin-right:3px;" href="{{ url('/all-funding-csv')}}">Export</a>
  
</h3>
  <div class="panel-body">
 <div class="table-responsive">
     <table class="table table-responsive">
              <thead>
                  <tr style="background-color:#00aaff;color:white;">
                  <th>Sr.No</th>
                  <th>Payment To</th>
                  <th>Type</th>
                  <th>Total Amount</th>
                  <th>Date</th>
                  <th>Location</th>
                  
                  </tr>
              </thead>
              <tbody id="customTable">
                 @foreach($funding as $fundings)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$fundings->name->fname}}</td>
                      <td>{{$fundings->fundingType}}</td>
                      <td>${{$fundings->fundingAmount}}.00</td>
                      <td>{{$fundings->fundingDate}}</td>
                      <td>{{$fundings->location}}</td>
                    </tr>
                 @endforeach
              </tbody>
          </table>
</div>
</div>
</div>
     
</div>

  </div>
  
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
                  <p style="display:inline;font-size:large;">Total Balance</p>
                  <p style="display:inline; float:right;font-size:x-large;color:darkgray;" id="totalAmount"></p>
                  
              </div>
          </div>
          <table class="table table-responsive">
              <thead>
                  <tr>
                  <th>Funds Type</th>
                  <th>Total Amount</th>
                  <th>Funds Date</th>
                  <th>Funds Location</th>
                  </tr>
              </thead>
              <tbody id="customTable">
                 @foreach($funding as $fundings)
                    <tr>
                      <td>{{$fundings->fundingType}}</td>
                      <td>{{$fundings->fundingAmount}}</td>
                      <td>{{$fundings->fundingDate}}</td>
                      <td>{{$fundings->location}}</td>
                    </tr>
                 @endforeach
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

 
@endsection

@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
function dynamicSearch(){
      
      var dateStart = $('#dateStart').val();
      var dateEnd = $('#dateEnd').val();
      var startAmount = $('#startAmount').val();
      var endAmount = $('#endAmount').val();
      
      $.ajax({
        type: 'GET',
        url: "{{route('dynamicFunding')}}",
         dataType:'json',
        data:{
            'dateStart': dateStart,
            'dateEnd': dateEnd,
            'startAmount': startAmount,
            'endAmount': endAmount,
        },
        success:function(data)
        {
            console.log(data);
            var i=0;
            var j=1;
            var html = '';
            // console.log(data);
            
          if(data['data']!=null){
           $('#customTable').html('');
            for(i=0; i<data['data'].length; i++){
                html+="<tr><td>"+j+"</td><td>"+data['data'][i]['userId']+"</td><td>"+data['data'][i]['fundingType']+"</td><td>$"+data['data'][i]['fundingAmount']+".00</td><td>"+data['data'][i]['fundingDate']+"</td><td>"+data['data'][i]['location']+"</td></tr>";
                j++;
        }
          
              
          }else{
              html="<tr><td></td><td>No Data Available</td><td></td><td></td></tr>";
          }
          
          console.log(html);
          
           
            $('#customTable').append(html);
        }
        });
      
  }
  
  function viewReport(a){
      var id = a;
      $.ajax({
        type: 'GET',
        url: "{{route('get-transaction-history')}}",
         dataType:'json',
        data:{
            'id': id,
            'flag': 0,
        },
        success: function (data){
            //console.log(data);
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
  
 </script>
  


@endsection
