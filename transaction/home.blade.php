@extends('layouts.admin')

@section('pagename')
Dashboard
@endsection

@section('content')
<style>
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
</style>
<div class="panel panel-headline">
    <div class="title" style="padding:0 25px;">
        <h3>Dashboard</h3> 
    <hr>
        
    </div>
            <div class="panel-heading" style="display:inline; float:left;">
        
              <h4 class="panel-title">Weekly Transactions Overview</h4>

              <p class="panel-subtitle">Period: {{$from}} , {{$dt}} </p>
        
            </div>
            
            <div class="col-md-8 float-right" style="display:inline-block;"> <input type="date" id="startDate" class="form-control dispClass" placeholder="Date From"><input type="date" class="form-control dispClass" id="endDate" placeholder="Date To">
            <button class="btn btn-primary dispClass" type="button" onclick="dateCheck()" style="width:10%; margin-top:0px;"> Search </button>
    </div>
            
            <div class="panel-body" style="clear:both;">
              <div class="row">
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-download" style="margin-top: 15px;"></i></span>
                    <p>
                      <span class="number">@if($today != null) {{count($today)}} @else No Transactions Today @endif</span>
                      <span class="title">Today Transactions</span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-shopping-bag" style="margin-top: 15px;"></i></span>
                    <p>
                      <span class="number">{{count($total)}}</span>
                      <span class="title">Total Transactions</span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-eye" style="margin-top: 15px;"></i></span>
                    <p>
                      <span class="number">{{count($arr)}}</span>
                      <span class="title">This Week Transactions</span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-bar-chart" style="margin-top: 15px;"></i></span>
                    <p>
                      <span class="number">{{$difference}}%</span>
                      <span class="title">Difference From Previous Week</span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-9">
                  <div id="container" style="width: 100%; height: 40%; margin: 10px auto"></div>
                </div>
                <div class="col-md-3">
                  <div class="weekly-summary text-right">
                    <span class="number">{{$sumThisWeek}}$</span></br>
                    <span class="info-label" style="display:inline-block;">Total This Week</span>
                    <span class="percentage" style="vertical-align:-webkit-baseline-middle;">@if($flag == 1)<i class="fa fa-caret-up text-success"></i>@else<i class="fa fa-caret-down text-danger"></i>@endif {{$difference}}%</span>
                  </div>
                  <div class="weekly-summary text-right">
                    <span class="number">{{$highest}}$</span> <span class="percentage"></span>
                    <span class="info-label">Highest Transaction</span>
                  </div>
                  <div class="weekly-summary text-right">
                    <span class="number">{{$average}}$</span> <span class="percentage"></span>
                    <span class="info-label">Average Transaction</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <!--END OVERVIEW -->

          <div class="row">
            <div class="col-md-6">
               <!--RECENT PURCHASES -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Customers</h3>
                  <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                  </div>
                </div>
                <div class="panel-body no-padding">
                  <table class="table table-striped" style="overflow-x:auto; padding:10px;">
                    <thead>
                      <tr><th>Sr No.</th><th>Name</th><th>Email</th><th>Phone</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        @if(count($customers) > 0)
                        @foreach($customers as $customer)
                      <tr>
                              <td><a href="#">{{$loop->iteration}}</a></td>
                              <td>{{$customer->fname}}&nbsp;{{$customer->lname}}</td>
                              <td>{{$customer->email}}</td>
                              <td>{{$customer->phone_no}}</td>
                              <td><span class="label label-success">{{($customer->status == 1)?'Active':'Not Active'}}</span></td>
                        </tr>
                      @endforeach
                      @else <tr><td colspan="5" class="text-center">No Customers This Week</td></tr>
                      @endif
                      </tbody>
                  </table>
                </div>
                <div class="panel-footer">
                  <div class="row">
                    <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 7 Days</span></div>
                    <div class="col-md-6 text-right"><a href="{{route('customers')}}" class="btn btn-primary">View All</a></div>
                  </div>
                </div>
              </div>
               <!--END RECENT PURCHASES -->
            </div>
            
            
            <div class="col-md-6">
               <!--MULTI CHARTS -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Recent Funding Events</h3>
                  <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                  </div>
                </div>
                <div class="panel-body">
                  <table class="table table-striped" style="overflow-x:auto; padding:10px;">
                      <thead>
                          <tr>
                              <th>Sr No.</th><th>Event Name</th><th>Date</th><th>Total Fund Raised</th><th>Grand Total</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>Johnson's home for Orphan</td>
                              <td>27-12-2011</td>
                              <td>35000$</td>
                              <td>35,000$</td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>Mr.Smith's welfare</td>
                              <td>27-12-2011</td>
                              <td>25800$</td>
                              <td>30,000$</td>
                          </tr>
                      </tbody>
                  </table>
                </div>
              </div>
               <!--END MULTI CHARTS -->
            </div>
            
            
          <!--</div>-->
          <!--<div class="row">-->
          <!--  <div class="col-md-7">-->
              <!-- TODO LIST -->
          <!--    <div class="panel">-->
          <!--      <div class="panel-heading">-->
          <!--        <h3 class="panel-title">To-Do List</h3>-->
          <!--        <div class="right">-->
          <!--          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>-->
          <!--          <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>-->
          <!--        </div>-->
          <!--      </div>-->
          <!--      <div class="panel-body">-->
          <!--        <ul class="list-unstyled todo-list">-->
          <!--          <li>-->
          <!--            <label class="control-inline fancy-checkbox">-->
          <!--              <input type="checkbox"><span></span>-->
          <!--            </label>-->
          <!--            <p>-->
          <!--              <span class="title">Restart Server</span>-->
          <!--              <span class="short-description">Dynamically integrate client-centric technologies without cooperative resources.</span>-->
          <!--              <span class="date">Oct 9, 2016</span>-->
          <!--            </p>-->
          <!--            <div class="controls">-->
          <!--              <a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>-->
          <!--            </div>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <label class="control-inline fancy-checkbox">-->
          <!--              <input type="checkbox"><span></span>-->
          <!--            </label>-->
          <!--            <p>-->
          <!--              <span class="title">Retest Upload Scenario</span>-->
          <!--              <span class="short-description">Compellingly implement clicks-and-mortar relationships without highly efficient metrics.</span>-->
          <!--              <span class="date">Oct 23, 2016</span>-->
          <!--            </p>-->
          <!--            <div class="controls">-->
          <!--              <a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>-->
          <!--            </div>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <label class="control-inline fancy-checkbox">-->
          <!--              <input type="checkbox"><span></span>-->
          <!--            </label>-->
          <!--            <p>-->
          <!--              <strong>Functional Spec Meeting</strong>-->
          <!--              <span class="short-description">Monotonectally formulate client-focused core competencies after parallel web-readiness.</span>-->
          <!--              <span class="date">Oct 11, 2016</span>-->
          <!--            </p>-->
          <!--            <div class="controls">-->
          <!--              <a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>-->
          <!--            </div>-->
          <!--          </li>-->
          <!--        </ul>-->
          <!--      </div>-->
          <!--    </div>-->
              <!-- END TODO LIST -->
          <!--  </div>-->
          <!--  <div class="col-md-5">-->
              <!-- TIMELINE -->
          <!--    <div class="panel panel-scrolling">-->
          <!--      <div class="panel-heading">-->
          <!--        <h3 class="panel-title">Recent User Activity</h3>-->
          <!--        <div class="right">-->
          <!--          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>-->
          <!--          <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>-->
          <!--        </div>-->
          <!--      </div>-->
          <!--      <div class="panel-body">-->
          <!--        <ul class="list-unstyled activity-list">-->
          <!--          <li>-->
          <!--            <img src="assets/img/user1.png" alt="Avatar" class="img-circle pull-left avatar">-->
          <!--            <p><a href="#">Michael</a> has achieved 80% of his completed tasks <span class="timestamp">20 minutes ago</span></p>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <img src="assets/img/user2.png" alt="Avatar" class="img-circle pull-left avatar">-->
          <!--            <p><a href="#">Daniel</a> has been added as a team member to project <a href="#">System Update</a> <span class="timestamp">Yesterday</span></p>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <img src="assets/img/user3.png" alt="Avatar" class="img-circle pull-left avatar">-->
          <!--            <p><a href="#">Martha</a> created a new heatmap view <a href="#">Landing Page</a> <span class="timestamp">2 days ago</span></p>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <img src="assets/img/user4.png" alt="Avatar" class="img-circle pull-left avatar">-->
          <!--            <p><a href="#">Jane</a> has completed all of the tasks <span class="timestamp">2 days ago</span></p>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <img src="assets/img/user5.png" alt="Avatar" class="img-circle pull-left avatar">-->
          <!--            <p><a href="#">Jason</a> started a discussion about <a href="#">Weekly Meeting</a> <span class="timestamp">3 days ago</span></p>-->
          <!--          </li>-->
          <!--        </ul>-->
          <!--        <button type="button" class="btn btn-primary btn-bottom center-block">Load More</button>-->
          <!--      </div>-->
          <!--    </div>-->
              <!-- END TIMELINE -->
          <!--  </div>-->
          <!--</div>-->
          <!--<div class="row">-->
          <!--  <div class="col-md-4">-->
              <!-- TASKS -->
          <!--    <div class="panel">-->
          <!--      <div class="panel-heading">-->
          <!--        <h3 class="panel-title">My Tasks</h3>-->
          <!--        <div class="right">-->
          <!--          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>-->
          <!--          <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>-->
          <!--        </div>-->
          <!--      </div>-->
          <!--      <div class="panel-body">-->
          <!--        <ul class="list-unstyled task-list">-->
          <!--          <li>-->
          <!--            <p>Updating Users Settings <span class="label-percent">23%</span></p>-->
          <!--            <div class="progress progress-xs">-->
          <!--              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width:23%">-->
          <!--                <span class="sr-only">23% Complete</span>-->
          <!--              </div>-->
          <!--            </div>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <p>Load &amp; Stress Test <span class="label-percent">80%</span></p>-->
          <!--            <div class="progress progress-xs">-->
          <!--              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">-->
          <!--                <span class="sr-only">80% Complete</span>-->
          <!--              </div>-->
          <!--            </div>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <p>Data Duplication Check <span class="label-percent">100%</span></p>-->
          <!--            <div class="progress progress-xs">-->
          <!--              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">-->
          <!--                <span class="sr-only">Success</span>-->
          <!--              </div>-->
          <!--            </div>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <p>Server Check <span class="label-percent">45%</span></p>-->
          <!--            <div class="progress progress-xs">-->
          <!--              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">-->
          <!--                <span class="sr-only">45% Complete</span>-->
          <!--              </div>-->
          <!--            </div>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <p>Mobile App Development <span class="label-percent">10%</span></p>-->
          <!--            <div class="progress progress-xs">-->
          <!--              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">-->
          <!--                <span class="sr-only">10% Complete</span>-->
          <!--              </div>-->
          <!--            </div>-->
          <!--          </li>-->
          <!--        </ul>-->
          <!--      </div>-->
          <!--    </div>-->
              <!-- END TASKS -->
          <!--  </div>-->
            <div class="col-md-6">
               <!--VISIT CHART -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title">Customer Spendings</h3>
                  <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                  </div>
                </div>
                <div class="panel-body">
                  <div id="container_bars" class="ct-chart"></div>
                </div>
              </div>
               <!--END VISIT CHART -->
            </div>
          <!--  <div class="col-md-4">-->
              <!-- REALTIME CHART -->
          <!--    <div class="panel">-->
          <!--      <div class="panel-heading">-->
          <!--        <h3 class="panel-title">System Load</h3>-->
          <!--        <div class="right">-->
          <!--          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>-->
          <!--          <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>-->
          <!--        </div>-->
          <!--      </div>-->
          <!--      <div class="panel-body">-->
          <!--        <div id="system-load" class="easy-pie-chart" data-percent="70">-->
          <!--          <span class="percent">70</span>-->
          <!--        </div>-->
          <!--        <h4>CPU Load</h4>-->
          <!--        <ul class="list-unstyled list-justify">-->
          <!--          <li>High: <span>95%</span></li>-->
          <!--          <li>Average: <span>87%</span></li>-->
          <!--          <li>Low: <span>20%</span></li>-->
          <!--          <li>Threads: <span>996</span></li>-->
          <!--          <li>Processes: <span>259</span></li>-->
          <!--        </ul>-->
          <!--      </div>-->
          <!--    </div>-->
              <!-- END REALTIME CHART -->
          <!--  </div>-->
          <!--</div>-->

</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Session Logout</h4>
      </div>
      <div class="modal-body">
        <p>Your Session Is Getting Expire in <span id="time"></span> secs &hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="extendTime()" class="btn btn-default" data-dismiss="modal">Extend Time</button>
        <button type="button" onclick="signout()" class="btn btn-primary">Signout</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

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
    $(document).ready(function(){
        var value = [];
        var logDate = [];
        var bars = [];
        
        var arr = <?php echo json_encode($arr); ?>;
        value = $.each(arr , function(i,v){
           v 
        });
         var arr2 = <?php echo json_encode($arr2); ?>;
        logDate = $.each(arr2 , function(i,v){
           v 
        });
        
        for(var i=0; i<arr.length; i++){
             bars[i] = [arr2[i] , arr[i]];
        }
        
        var customer_spending = <?php echo json_encode($customer_spending); ?>;
        
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
    
function dateCheck(){
    var date1 = $('#startDate').val();
    var date2=$('#endDate').val();
    console.log(date1);

    $.ajax({
    type: 'get',
    url: "{{route('search-dates')}}",
    //dataType: 'json',
    data:{
        'date1': date1,
        'date2': date2,
    },
    success: function (data){
      $('#ajax-extension').empty();
        $('#ajax-extension').html(data);
        
},
    error: function(){
        
    }
});
    
}
    
 var interval;
 var timer;
 
$(document).on('mousemove keyup keypress',function(){
    clearTimeout(interval);
    settimeout();
})

function settimeout(){
    interval=setTimeout(function(){
            var counter=5;
            $('#confirmModal').modal('show');
            timer = setInterval(function() {
                    counter--;
                    $('#time').text(counter);
                        if(counter == 0){
                           clearInterval(timer);
                           counter = 10;
                           $('#confirmModal').modal('hide');
                           signout();
                        }
                    }, 1000);
        },(1000*60*1)) // 1 mins
  
}

function signout(){
    // $.ajaxSetup({
    //     headers:{
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // $.ajax({
    //     type: 'post',
    //     url: "{{route('logout')}}",
    // });
    
    // location.href="/public/login";
}

function extendTime(){
    $('#time').text('');
    counter = 10;
   clearTimeout(interval);
    clearInterval(timer);
    settimeout();
}

</script>