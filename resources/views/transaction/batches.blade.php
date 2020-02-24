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
.collapsing{
    position:absolute !important;
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
    
    .highcharts-credits{
       display:none;
    }
.highcharts-legend{
       display:none;
    }
.highcharts-menu-item:last-child{
    display:none;
    
}

.dispClass{
    display:inline-block;
    width:38%;
    margin-left:10px;
    margin-top:20px;
}

}

</style>

<div class="container" style="width:100%;">
<div class="panel panel-headline">
    <div class="title" style="padding:0 25px;">
        <h3 style="display:inline-block;">Batches</h3>
        <button data-toggle="collapse" href="#batchOptions" role="button" aria-expanded="false" aria-controls="batchOptions" style="display:inline; margin-top:20px;border:none;" class="pull-right"><i class="fa fa-bars"></i></button>
      
      <div class="collapse" id="batchOptions" >
          <div class="panel panel-body dropdown" style="position: absolute;right: 43px;z-index: 1000000;">
                <ul class="unstyled centered dropdown-list" style="list-style-type:none;padding: 11px 0px 0 5px;">
                    <li>
                         <span class="search-input"><input type="text" class="form-control" id="accountNo" placeholder="Search Account No."></span>
                       <a class="btn btn-primary search-button" style="width:100%">Location</a>
                    </li>
                    <li>
                         <span class="search-input"  ><input type="text" class="form-control" id="accountNo" placeholder="Search Account No."></span>
                       <a class="btn btn-primary search-button  "style="width:100%">Account No.</a>
                    </li>
                    <li>
                         <span class="search-input"  ><input type="text" class="form-control" id="terminal" placeholder="Search Terminal"></span>
                       <a class="btn btn-primary search-button  "style="width:100%">Terminal</a>
                    </li>
                    <li>
                         <span class="search-input"  ><input type="text" class="form-control" id="cardNo" placeholder="Search Card No"></span>
                       <a class="btn btn-primary search-button  "style="width:100%">Card No.</a>
                    </li>
                    <li>
                         <span class="search-input"  ><input type="text" class="form-control" id="batchType" placeholder="Search Batch Type"></span>
                       <a class="btn btn-primary search-button" style="width:100%" onclick="batchSearch()">Batch Type</a>
                    </li>
                    <li>
                         <span class="search-input"  ><input type="text" class="form-control" id="dataSelector" placeholder="Search Date"></span>
                       <a class="btn btn-primary search-button  " style="width:100%">Date Selector</a>
                    </li>
                     <li>
                     <li>
                        <a class="btn btn-primary" href="{{ url('/all-batches-csv')}}" style="width: 100%;margin-top: 10px;">Export</a>
                    </li>
                </ul>
            </div>
        </div>
        
        
    <hr>
    </div>
            <div class="panel-body" style="clear:both;">
              <div class="row">
                <div class="col-md-4">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-download" style="margin-top: 15px;"></i></span>
                    <p>
                      <span class="number">No Batches</span>
                      <span class="title">Total Batches</span>
                    </p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-eye" style="margin-top: 15px;"></i></span>
                    <p>
                      <span class="number">85</span>
                      <span class="title">Total Batch Volume</span>
                    </p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-eye" style="margin-top: 15px;"></i></span>
                    <p>
                      <span class="number">85</span>
                      <span class="title">Total Number Of Sales</span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div id="container" style="width: 100%; height: 40%; margin: 10px auto"></div>
                </div>
              </div>
            </div>
          </div>
          
          

<div class="panel panel-headline">
        <div class="panel-body">
                
    <!--<h2>Batches</h2>-->
    <!-- <h4 style="background:#e1e1e1; padding:10px;"> All Batches</h4>-->
    
    <!--<select style="border:1px solid #e1e1e1; background:transparent; color:#8282fd;" onchange="search(0)" id="dateVal">-->
    <!--    <option value = "4" selected>All Dates</option>-->
    <!--    <option value = "1">Current Day</option>-->
    <!--    <option value = "2">Last 7 Days</option>-->
    <!--    <option value = "3">Last 30 Days</option>-->
    <!--</select>-->
    
    <!--<select style="border:1px solid #e1e1e1; background:transparent; color:#8282fd;" onchange="search(1)" onchange="statusSearch()" id="statusVal">-->
    <!--    <option value="5" selected>All Statuses</option>-->
    <!--    <option value="1">Open</option>-->
    <!--    <option value="2">Close</option>-->
    <!--    <option value="3">Sent</option>-->
    <!--    <option value="4">Failed</option>-->
        
    <!--</select>-->
    
    <table class="table table-responsive" style="margin-top:10px;">
    <thead style="background:#e1e1e1;">
        <tr>
            <th><input id="mainCheckClass" onClick="checkboxesClick(this,0)" type="checkbox" value="00"></th>
            <!--<th></th>-->
            <th>
                Batch No:
            </th>
             <th>
                Batch Status
            </th>
            <th>
                Location
            </th>
             <th>
                No. Of Sales
            </th>
            <th>
                Sales Amount
            </th>
             <th>
                Credit
            </th>
             <th>
                Credit Amount
            </th>
             <th>
                Net Batch
            </th>
            <th>
                Batched Opened At
            </th>
            <th>
                Batch Close Date
            </th>
        </tr>
        
    </thead>
    <tbody id="tableBody">
        @if($all)
        @foreach($all as $allPayments)
        <tr>
            <td><input class="customCheckClass" type="checkbox" name="customCheck[]" onclick="checkboxesClick(this,1)" value="{{$allPayments->id}}"></td>
            <!--<td width='10%'><a href="{{route('approve-batch' , ['id'=> $allPayments->id])}}" title="Approve Batch" class="text-success"><span class="fa fa-check"></span></a><a href="{{route('viewBatchData',['id'=>$allPayments->id])}}" class="text-default" style="cursor:pointer;"><span class="fa fa-eye"></span></a></td>-->
            <td>Batch 00{{$allPayments->id}}</td>
            <td>@if($allPayments->status==1)
            <span class="badge bg-success">Approved</span>
                @else
                <span class="badge bg-alert">Pending</span>
                @endif
            </td>
            <td>{{$allPayments->location}}</td>
            <td>Sales</td>
            <td>{{$allPayments->amount}}$</td>
            <td>credits</td>
            <td>credits amount ($)</td>
            <td>net batch</td>
            <td>{{$allPayments->created_at->format('d-m-y')}}</td>
            <td>{{$allPayments->batchCloseDate}}</td>
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
        

@endsection

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>


<script>

function batchSearch(){
    alert("hello");
}
    function checkboxesClick(ele,flag){
        if(flag == 0){
            if(ele.checked){
                $('.customCheckClass').prop("checked", true);
                $('#deleteBtn').prop('disabled', false);
                $('#mergeBtn').prop('disabled', false);
            }else{
                $('.customCheckClass').prop("checked", false);
                $('#deleteBtn').prop('disabled', true);
                $('#mergeBtn').prop('disabled', true);
            }
        }
        if(flag==1){
            if(ele.checked)
                $(ele).prop("checked", true);
            else $(ele).prop("checked", false);
        }

        var len = $("input[name='customCheck[]']:checked").length;
            if(len == 1){
                $('#deleteBtn').prop('disabled', false);
                $('#editBtn').prop('disabled', false);
                $('#mergeBtn').prop('disabled', true);
            }else if(len > 1){
                $('#deleteBtn').prop('disabled', false);
                $('#editBtn').prop('disabled', true);
                $('#mergeBtn').prop('disabled', false);
            }else{
                $('#deleteBtn').prop('disabled', true);
                $('#editBtn').prop('disabled', true);
                $('#mergeBtn').prop('disabled', true);
            }
}


 function search(flag){
     
     if(flag == 0){
        var selected = $('#dateVal').children("option:selected").val();
        var flag = 0;
     }
    else{
     var selected = $('#statusVal').children("option:selected").val();
     var flag = 1;
    }
      $.ajax({
        type: 'GET',
        url: "{{route('retrieve-searched-batch')}}",
         dataType:'json',
        data:{
          'search':selected,
          'flag':flag,
        },
        success:function(data){
             $('#tableBody').html('');
            if(data['data'] != ''){
            var html='';
            $.each(data['data'],function(i,v){
                var approveUrl = "{{url('approve-batch?id=')}}"+v['id'];
                var viewUrl = "{{url('viewBatchData?id=')}}"+v['id'];
                var newSpan='';
                if(v['status'] == 1)
                  newSpan='<span class="badge bg-success">Approved</span>';
                else
                  newSpan='<span class="badge bg-alert">Pending</span>';
                  
                html+='<tr><td><input class="customCheckClass" type="checkbox" name="customCheck[]" onclick="checkboxesClick(this,1)" value="'+v['id']+'"></td> <td width="10%"><a href="'+approveUrl+'" title="Approve Batch" class="text-success"><span class="fa fa-check"></span></a><a href="'+viewUrl+'" class="text-default" style="cursor:pointer;"><span class="fa fa-eye"></span></a></td><td>Batch 00'+v['id']+'</td><td>'+v['location']+'</td><td>'+v['amount']+'</td><td>'+v['batchCloseDate']+'</td><td>'+newSpan+'</td><td>'+v['created_at']+'</td></tr>'
            });
            
            $('#tableBody').append(html);
        }
        else $('#tableBody').html('<tr><td rowSpan="6">No Data Found</td></tr>');
        
        }
      });
     
 }
 
 
    $(document).ready(function(){
        var value = [];
        var logDate = [];
        var bars = [];
        
        var arr = [5,6,8,2,4,7];
        value = $.each(arr , function(i,v){
           v 
        });
         var arr2 = [2,5,9,6,3,5];
        logDate = $.each(arr2 , function(i,v){
           v 
        });
        
        for(var i=0; i<arr.length; i++){
             bars[i] = [arr2[i] , arr[i]];
        }
        
        var customer_spending = [5,8,9,6,3,2];
        
        console.log(customer_spending);
        
        Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Weekly Transaction Graph'
    },
    subtitle: {
        text: 'Payclone Inc'
    },
    xAxis: {
        title:{
            text: ''
        },
        categories: logDate
    },
    yAxis: {
        title: {
            text: 'Amount'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    
    tooltip: {
        headerFormat: '<b>Point Description</b><br />',
        pointFormat: 'Payment Status = Captured <br /> Payment Method = Visa'
    },
    
    series: [{
        name: '',
        data: value,
    }
    ]
});

Highcharts.chart('container_bars', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Amount Spending'
    },
    subtitle: {
        text: 'Payclone Inc'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Amount Spent'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Amount Spent: <b>{point.y:.1f} $</b>'
    },
    series: [{
        name: 'Amount',
        data: customer_spending,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

    });



</script>