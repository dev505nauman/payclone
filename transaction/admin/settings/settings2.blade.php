 @extends('layouts.admin')

@section('pagename')
Account Settings
@endsection

@section('content')

<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
.w3-light-grey,.w3-hover-light-grey:hover, .w3-light-gray, .w3-hover-light-gray:hover{
        color: #aeb7c2!important;
    background-color:  #ffffff!important;
    font-family: inherit;
}
.w3-button:hover {
    color: #f8f7f7!important;
    background-color: #3b3f45!important;
}
.w3-white, .w3-hover-white:hover {
    color: #fff!important;
    background-color: #ffffff!important;
}
.btn-info {
    color: #fff;
    width: 41px;
    background-color: #00aaff;
    border-color: #00aaff;
}
.btn-info:hover{
    color: #fff;
    background-color: #009DD9;
    border-color: #009DD9;
    
}
::-webkit-scrollbar {
  width: 8px;
}


 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #161A20; 
  border-radius: 5px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: gray; 
}
.w3-sidebar {
    /* height: 100%; */
    width: 200px;
    background-color: #fff;
    position: fixed!important;
    z-index: auto;
    top: 107px;
    overflow: scroll;
    bottom: 0;
}
.w3-bar-block .w3-dropdown-hover, .w3-bar-block .w3-dropdown-click {
    width: 100%;
    background-color: #ffffff;
    color: #9da5b7;
   
}
.dropdown-click:hover {
    background-color: #3b3f45;
    color: #fff;
}

.w3-dropdown-hover:hover > .w3-button:first-child, .w3-dropdown-click:hover > .w3-button:first-child {
    background-color: #3b3f45!important;
    color: #fff!important;
}
.w3-dropdown-click
{
    padding-left:17px;
}
@media only screen and (max-width: 767px){
    .btn1 .btn-info{
        position:relative;
        bottom:49px;
    }
.btn-toggle-fullwidth{
    position:relative;
    top:37px;
}
.container-fluid{
    margin-top:-54px;
}
    .copyright{
        display:none;
    }

}
</style>
<body>
<div id="myDIV">
<div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:235px; margin: -26px;">
    
  
  <div class="w3-bar-item w3-button" onclick="myAccFunc()" >
 Site Settings<i class="fa fa-caret-down" style="margin-left:7px;"></i></div>
  <div id="demoAcc" class="w3-hide w3-white w3-card-4">
    <div class="w3-dropdown-click">
   
    <a href="#" class="w3-bar-item w3-button">Terminals</a>
      <a href="{{route('custom-fields')}}" class="w3-bar-item w3-button">Custom Fields</a>
      <a href="#" class="w3-bar-item w3-button">Descriptors</a>
        <a href="#" class="w3-bar-item w3-button">Receipts</a>
      <a href="#" class="w3-bar-item w3-button">Batch Settings</a>
        <a href="#" class="w3-bar-item w3-button">Security</a>
      
  </div>

    </div>
  
  <a href="#" class="w3-bar-item w3-button">Invoice Settings</a>
  <a href="#" class="w3-bar-item w3-button">Subscription Plans</a>
  <a href="#" class="w3-bar-item w3-button">Gift Cards</a>
  <a href="#" class="w3-bar-item w3-button">Coupons</a>
  <a href="#" class="w3-bar-item w3-button">Currencies</a>
  <a href="#" class="w3-bar-item w3-button">Taxes</a>
  <a href="#" class="w3-bar-item w3-button">Shipping</a>
  <a href="#" class="w3-bar-item w3-button">Email Templates</a>
  <a href="#" class="w3-bar-item w3-button">Hosted Payment Page</a>  
  <a onclick="paymentGateway()" class="w3-bar-item w3-button">Payment Gateways</a> <!-- href="{{url("payment-gateways")}}" -->
  <a href="#" class="w3-bar-item w3-button">Apple Pay</a>
  <a href="#" class="w3-bar-item w3-button">Dunning Management</a>
  <a href="#" class="w3-bar-item w3-button">Fraud Management</a>
  <a href="#" class="w3-bar-item w3-button">Analytics</a>

</div>



</div>


<div class="card" id="content" style="background-color:white; margin-left: 212px; padding-bottom: 212px; position: relative;top: -26px;">
    <button id="z1" class="btn1 btn-info" onclick="myFunction()"><i class="fa fa-arrow-left"></i></button>
   
    <div id="profileEdit" style="margin-top:50px; width:70%; margin:50px auto 0px;">
    <!--    <div class="panel-body">-->
           @if(Session::has('msg'))
           <p class="alert alert-success">{{Session::get('msg')}}</p>
           @endif
           
            <div class="row">
                <div class="col-md-12">
                    <h2 style="display:inline-block;">Manage Account Details</h2>
                    <button class="btn btn-primary float-right" style="margin-top:10px;" data-toggle="modal" data-target="#changePass">Change Password</button>
                </div>
            
          <form action="{{route('update-profile')}}" method="post" class="cardform">
              @csrf
                  <div class="col-md-6 bars">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" id="fname" value="{{$data['fname']}}" name="fname">
                  </div>
                  <div class="col-md-6 bars">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" id="lname" value="{{$data['lname']}}" name="lname">
                  </div>
                  <div class="col-md-6 bars">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" value="{{$data['email']}}" name="email" readonly>
                  </div>
                  
                  <div class="col-md-6 bars">
                      <label for="dob">Date Of Birth</label>
                      <input type="date" class="form-control" id="dob" value="{{$data['dob']}}" name="dob">
                  </div>
                  
                  <div class="col-md-6 bars">
                      <label for="phone">Phone</label>
                      <input type="number" class="form-control" id="phone" value="{{$data['phone_no']}}" name="phone_no">
                  </div>
                  
                  <div class="col-md-6 bars">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" value="{{$data['address']}}" name="address">
                  </div>
                  
                   <div class="col-md-4 bars">
                      <label for="city">City</label>
                      <input type="text" class="form-control" id="city" value="{{$data['city']}}" name="city">
                  </div>
                  
                   <div class="col-md-4 bars">
                      <label for="state">State</label>
                      <input type="text" class="form-control" id="state" value="{{$data['state']}}" name="state">
                  </div>
                  
                   <div class="col-md-4 bars">
                      <label for="zip">Zip</label>
                      <input type="text" class="form-control" id="zip" value="{{$data['zip']}}" name="zip">
                  </div>
                    
                    <div class="col-md-12 text-right">
                      <input type="submit" class="btn btn-primary" name="submit">
                  </div>
                      
            </form>
        
              </div>

    <!--    </div>-->
       
    </div>
</div>


<!-- Modal Code Start -->

<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
     <form method="post" action="{{route('password-change')}}" id="password-change">
        @csrf
        
            <div class="col-md-12 bars">
              <label for="old">Old Password</label>
                <input type="password" id="old" class="form-control" name="oldPass" required>
              </div>
              <div class="col-md-12 bars">
                  <label for="new">New Password</label>
                  <input type="password" id="new" class="form-control" name="newPass" required>
              </div>
              <div class="col-md-12 bars">
                  <label for="confirmNew">Confirm New Password</label>
                  <input type="password" id="confirmNew" class="form-control" name="confirmNewPass" required>
              </div>
              <div class="col-md-12 bars">
              <p id="msg" style="color:red;"></p>
              </div>
              
              
      <div class="modal-footer">
          
       <button onclick="passwordChange()" type="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal Code Ends Here -->

<script>

function paymentGateway(){
    
    $.ajax({
                type: 'get',
                url: "{{route('payment-gateways')}}",
                success: function (data) {
                    
                    $('#profileEdit').css('width','90%');
                    $('#profileEdit').html(data);
            }
});

}


function passwordChange(){
    
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
    $.ajax({
                type: 'post',
                url: "{{route('pass_check')}}",
                data:{
                    'pass' :$('#old').val(),
                },
                success: function (data) {
                   //console.log(data['result']);
                   if(data['result'] == 'true'){
                       var pass=$("#new").val();
                       var pass2=$("#confirmNew").val();
                           
                           if(pass == '' || pass2 == ''){
                              $('#msg').text("Enter New Password");
                           } 
                           
                           if(pass == pass2 && pass != ''){
                             $('#password-change').submit();
                           }
                           
                           else $('#msg').text("*password donot match");
                   }
                   
                   else $('#msg').text("*password incorrect");
            }
});
    
  
   
    
   
}




function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-blue";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-blue", "");
  }
}


function myFunction() {
  var x = document.getElementById("myDIV");
  var btn_class=$('#z1').children().attr('class');
  
  if (x.style.display === "none") {
    x.style.display = "block";
    $('#z1').children().removeClass('fa-arrow-right');
    $('#z1').children().addClass('fa-arrow-left');
  } else {
    x.style.display = "none";
    $('#z1').children().removeClass('fa-arrow-left');
     $('#z1').children().addClass('fa-arrow-right');
    
    
  }
  changeMargin();
  
}



function changeMargin() {
  var x = document.getElementById("content");
  
  if (x.style.marginLeft === "212px") {
    x.style.marginLeft = "-30px";
  } else {
    x.style.marginLeft= "212px";
  }
}

/*$("#z1").click(function(){
 
  icon = $(this).find("i");
  icon.hasClass("fa fa-arrow-left"){
    icon.removeClass("fa fa-arrow-left");
//    icon.addClass
  }else{
    icon.addClass("fa fa-arrow-left").removeClass("fa fa-arrow-right");
  }
})*/

/*$(document).ready(() => {
  const button = $(".btn1");

  button.click(() => {
    if (button.text() == " left") {
      button.html('<i class="fa fa-arrow-right"></i> right');
    } else {
      button.html('<i class="fa fa-arrow-left"></i> left');
    }
  });
});*/



// $(document).ready(function(){
//     $(".lnr").click (function(){
//         $(this).addClass(active);
//     })
// })
</script>

</body>
</html>

@endsection
