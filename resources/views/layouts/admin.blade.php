
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>@yield('pagename')</title>
 <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
      <link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}">
      <!--<link href="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" rel="stylesheet">-->
  
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

  <link rel="stylesheet" href="{{asset('style.css')}}">

  <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">


  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
  
  <!-- DATA TABLES-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   
   <!-- GRAPHS-->
 <link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />

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
.panelt{
    width: 310px;
    position: absolute;
    right: 12px;
    margin-top:50px;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 7px;
    font-weight: 700;
}
li{
        padding: 0px;
        cursor:pointer;
}
price{
    color:green;
}
.tooltip {
  position: relative;
  display: inline-block;
 
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 320px;
  height:100px;
  background-color: gray;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

 
  position: absolute;
  z-index: 1;
  right:100%
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

</style>

</head>
<body>
  <!-- WRAPPER -->
  <div id="wrapper">

    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
        <a href="https://www.dev505.com" target="_blank"><img src="{{asset('assets/img/fluxpay-logo.png')}}" alt="Klorofil Logo" class="img-responsive logo" style="width:120px;height:36px;"></a>
      </div>
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
          
        </div>
        <div id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">
            <li class="drdopdown">
                <a href="#" class="dropdown-toggle">
                <i class="fa fa-search"></i>
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                <i class="lnr lnr-alarm"></i>
                <span class="badge bg-danger">5</span>
              </a>
              <ul class="dropdown-menu notifications">
                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                <li><a href="#" class="more">See all notifications</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i><!--<i class="icon-submenu lnr lnr-chevron-down"></i>--></a>
              <ul class="dropdown-menu">
                <li><a href="#">Basic Use</a></li>
                <li><a href="#">Working With Data</a></li>
                <li><a href="#">Security</a></li>
                <li><a href="#">Troubleshooting</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/img/user.png')}}" class="img-circle" alt="Avatar"><!--<i class="icon-submenu lnr lnr-chevron-down"></i>--></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                <li><a href="{{ route('settings') }}"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                <li><a href="{{ url('/logout') }}"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
              </ul>
            </li>
            <!-- <li>
              <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
       <div class="sidebar-scroll">
        <nav>
          
  <ul class="nav">
          <li><a href="{{ route('home') }}" class="{{ (request()->is('home')) ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
          
          
          @if(Auth::user()->role_id==1)
        <!--<li><a href="{{ route('charge') }}" class="#"><i class="lnr lnr-dice"></i> <span>Charge</span></a></li>-->
        <li><a href="{{ route('charge') }}" class="#"><i class="lnr lnr-dice"></i> <span>Terminal</span></a></li>
        <li><a href="{{ route('transactions') }}" class="#"><i class="lnr lnr-book"></i> <span>Transactions</span></a></li>
        <li><a href="{{ route('payfac') }}" class="#"><i class="lnr lnr-briefcase"></i> <span>PayFac</span></a></li>
        <li><a href="{{ route('merchants') }}" class="{{ (request()->is('merchants')) ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Merchants</span></a></li>
        <!--<li><a href="{{ url('terminal') }}" class="#" ><i class="fa fa-window-maximize "></i> <span>Terminal</span></a></li>-->
        <li><a href="{{ route('customers') }}" class="{{ (request()->is('customers')) ? 'active' : '' }}"><i class="lnr lnr-users"></i> <span>Customers</span></a></li>
        <li><a href="{{ route('customer-contacts') }}" class="{{ (request()->is('customer-contacts')) ? 'active' : '' }}"><i class="lnr lnr-license"></i> <span>Contacts</span></a></li>
        <li><a href="{{ route('Wallets') }}" class="#"><i class="lnr lnr-gift"></i> <span>Wallets</span></a></li>
        <li><a href="{{ route('fundings') }}" class="#"><i class="lnr lnr-gift"></i> <span>Funding</span></a></li>
        <li><a id="toggleBtn"><i class="fa fa-bar-chart"></i> <span>Reporting</span><i style="margin-left:10px" class="fa fa-angle-down"></i></a>
            <ul style="list-style-type:none;margin-left:10px;" id="toggleId" hidden>
                <li><a href="{{ route('reportings') }}" class=""><i class="fa fa-bar-chart"></i> <span>Reporting</span></a></li>
                <li><a href="{{ route('batch') }}" class=""><i class="fa fa-bar-chart"></i> <span>Batches</span></a></li>
            </ul>
        </li>
        <li><a href="#" class="#"><i class="lnr lnr-store"></i> <span>Store</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-usd"></i> <span>Quotes</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-credit-card"></i> <span>Invoices</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-envelope-open-o"></i> <span>Subscriptions</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-shopping-bag"></i> <span>Products</span></a></li>
        <li><a href="#" class="#"><i class="lnr lnr-pie-chart"></i> <span>Analytics</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-random"></i> <span>Integrations</span></a></li>
        




<!--        <li><a href="{{ route('ticket-management') }}" class="{{ (request()->is('ticket-management')) ? 'active' : '' }}"><i class="lnr lnr-bubble"></i> <span>Support</span></a></li>
-->
          @elseif(Auth::user()->role_id==2)
           <li><a href="#" class="#"><i class="fa fa-window-maximize "></i> <span>Terminal</span></a></li>
        <li><a href="{{ route('customers') }}" class="{{ (request()->is('customers')) ? 'active' : '' }}"><i class="lnr lnr-users"></i> <span>Customers</span></a></li>
        <li><a href="#" class="#"><i class="lnr lnr-gift"></i> <span>Rewards</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-bar-chart"></i> <span>Reporting</span></a></li>
        <li><a href="#" class="#"><i class="lnr lnr-store"></i> <span>Store</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-random"></i> <span>Integrations</span></a></li>
          
          @elseif(Auth::user()->role_id==3)

        <li><a href="{{ route('merchants') }}" class="{{ (request()->is('merchants')) ? 'active' : '' }}"><i class="lnr lnr-users"></i> <span>Merchants</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-window-maximize "></i> <span>Terminal</span></a></li>
        <li><a href="{{ route('customers') }}" class="{{ (request()->is('customers')) ? 'active' : '' }}"><i class="lnr lnr-users"></i> <span>Customers</span></a></li>
        <li><a href="#" class="#"><i class="lnr lnr-gift"></i> <span>Rewards</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-bar-chart"></i> <span>Reporting</span></a></li>
        <li><a href="#" class="#"><i class="lnr lnr-store"></i> <span>Store</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-random"></i> <span>Integrations</span></a></li>
        
        @elseif(Auth::user()->role_id==4)
        

        
        <li><a href="{{ route('terminal') }}" class="{{ (request()->is('reportings')) ? 'active' : '' }}"><i class="fa fa-window-maximize "></i> <span>Terminal</span></a></li>
        <li><a href="{{ route('customers') }}" class="{{ (request()->is('customers')) ? 'active' : '' }}"><i class="lnr lnr-users"></i> <span>Customers</span></a></li>
        <li><a href="#" class="#"><i class="lnr lnr-gift"></i> <span>Rewards</span></a></li>
        <li><a href="{{ route('customer-contacts') }}" class="{{ (request()->is('customer-contacts')) ? 'active' : '' }}"><i class="lnr lnr-license"></i> <span>Contacts</span></a></li>
        <li><a id="toggleBtn"><i class="fa fa-bar-chart"></i> <span>Reporting</span><i style="margin-left:10px" class="fa fa-angle-down"></i></a>
            <ul style="list-style-type:none;margin-left:10px;" id="toggleId" hidden>
                <li><a href="{{ route('reportings') }}" class=""><i class="fa fa-bar-chart"></i> <span>Reporting</span></a></li>
                <li><a href="{{ route('batch') }}" class=""><i class="fa fa-bar-chart"></i> <span>Batches</span></a></li>
            </ul>
        </li>
        <li><a href="#" class="#"><i class="lnr lnr-store"></i> <span>Store</span></a></li>
        <li><a href="#" class="#"><i class="fa fa-random"></i> <span>Integrations</span></a></li>

              

        @endif
              
              <li><a href="{{ route('settings') }}" class="{{ (request()->is('settings')) ? 'active' : '' }}"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>


  </ul>       </nav>
      </div>
    </div>
    <!-- END LEFT SIDEBAR -->

    <!-- MAIN -->
    <div class="main">

      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid" id="ajax-extension">

          <!-- OVERVIEW -->
          @if(Session::has('message'))
            <p id="message" class="alert {{ Session::get('alert-class', 'alert-info') }} sessionmsg">{{ Session::get('message') }}</p>
            @else <p id="message"></p>
          @endif
          @yield('content')
        </div>
      </div>
      <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->

    <div class="clearfix"></div>
    <footer>
      <div class="container-fluid">
        <p class="copyright"><a href="{{ route('support-system') }}"><span>Support</span></a> | &copy; 2017 <a href="https://www.dev505.com" target="_blank">Powered By Dev505</p>
        
      </div>
    </footer>
  </div>
  <!-- END WRAPPER -->

  <!-- Javascript -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chartist/js/chartist.min.js')}}"></script>
  <script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>
  <script src="{{asset('js/bootbox.all.min.js')}}"></script>
  <script src="{{asset('js/card.js')}}"></script>
  <script src="{{asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
  
<script>
  $(function() {
    var data, options;

    // headline charts
    data = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      series: [
        [23, 29, 24, 40, 25, 24, 35],
        [14, 25, 18, 34, 29, 38, 44],
      ]
    };

    options = {
      height: 300,
      showArea: true,
      showLine: false,
      showPoint: false,
      fullWidth: true,
      axisX: {
        showGrid: false
      },
      lineSmooth: false,
    };

    new Chartist.Line('#headline-chart', data, options);


    // visits trend charts
    data = {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      series: [
        {
          name: 'series-real',
          data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
        },
        {
          name: 'series-projection',
          data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
        }
      ]
    };

    options = {
      fullWidth: true,
      lineSmooth: false,
      height: "270px",
      low: 0,
      high: 'auto',
      series: {
        'series-projection': {
          showArea: true,
          showPoint: false,
          showLine: false
        },
      },
      axisX: {
        showGrid: false,

      },
      axisY: {
        showGrid: false,
        onlyInteger: true,
        offset: 0,
      },
      chartPadding: {
        left: 20,
        right: 20
      }
    };

    new Chartist.Line('#visits-trends-chart', data, options);


    // visits chart
    data = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      series: [[6384, 6342, 5437, 2764, 3958, 5068, 7654]]
    };

    options = {
      height: 300,
      axisX: {
        showGrid: false
      },
    };

    new Chartist.Bar('#visits-chart', data, options);


    // real-time pie chart
    var sysLoad = $('#system-load').easyPieChart({
      size: 130,
      barColor: function(percent) {
        return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
      },
      trackColor: 'rgba(245, 245, 245, 0.8)',
      scaleColor: false,
      lineWidth: 5,
      lineCap: "square",
      animate: 800
    });

    var updateInterval = 3000; // in milliseconds

    setInterval( function() {
      var randomVal;
      randomVal = getRandomInt(0, 100);

      sysLoad.data('easyPieChart').update(randomVal);
      sysLoad.find('.percent').text(randomVal);
    }, updateInterval);

    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

  });
   $(document).ready(function(){
    $('.sessionmsg').fadeIn().delay(1500).fadeOut();
    
    
//     window.setInterval(function(){
//  alert("hello");
// }, 5000)
    
    
      });
      
    $('#toggleBtn').click(function(){
        $('#toggleId').toggle();
    })
</script>

@yield('scripts')

</body>
</html>