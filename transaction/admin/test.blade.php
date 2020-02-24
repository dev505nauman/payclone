@extends('layouts.admin')

@section('pagename')
Customers
@endsection

@section('content')
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 0.2px solid #ececf9;
  padding: 8px;
}

/*#customers tr:nth-child(even){background-color: #f2f2f2;}*/

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #00AAFF;
  color: white;
}
.card{
     
    background-color: white;
        margin-bottom: 15px;
    padding:15px;
    
}
.advanced-search-btn {
    display: inline-block;
    float: right;
    margin-top: 14px;
}
.title-heading {
    display: inline-block;
}

.styled-checkbox {
  position: absolute;
  opacity: 0;
}
.styled-checkbox + label {
  position: relative;
  cursor: pointer;
  padding: 0;
}
.styled-checkbox + label:before {
  content: "";
  margin-right: 10px;
  display: inline-block;
  vertical-align: text-top;
  width: 20px;
  height: 20px;
  background: white;
  border: 1px solid #adadaf;
}
.styled-checkbox:hover + label:before {
  background: #00a0f0;
  border: none;
}
.styled-checkbox:focus + label:before {
  box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
}
.styled-checkbox:checked + label:before {
  background: #00a0f0;
  border: 1px solid #00a0f0;
}
.styled-checkbox:disabled + label {
  color: #b8b8b8;
  cursor: auto;
}
.styled-checkbox:disabled + label:before {
  box-shadow: none;
  background: #ddd;
}
.styled-checkbox:checked + label:after {
  content: "";
  position: absolute;
  left: 5px;
  top: 9px;
  background: white;
  width: 2px;
  height: 2px;
  box-shadow: 2px 0 0 white, 4px 0 0 white, 4px -2px 0 white, 4px -4px 0 white, 4px -6px 0 white, 4px -8px 0 white;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}



.unstyled {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

li {
  margin: 20px 0;
  cursor: pointer;
}
.seacrh-col {
    text-align: left;
    color: #adadaf;
    z-index: 11111111111;
-webkit-box-shadow: -4px 0px 12px -4px rgba(97,97,97,1);
-moz-box-shadow: -4px 0px 12px -4px rgba(97,97,97,1);
box-shadow: -4px 0px 12px -4px rgba(97,97,97,1);
}
.seacrh-col label {
    font-weight: 400;
}
.search-col-header  {
    border-bottom: 1px solid #eee;
}
.search-col-header h4 {
    display: inline-block;
}
.search-col-header .close-col{
    display: inline-block;
    float: right;
    margin-top: 9px;
}
.search-col-content h4 {
    border-bottom: 1px solid #eee;
    padding-bottom: 8px;
}
.seacrh-col {
    position: absolute;
    right: 0;
    background: #fff;
    display: block;
}
.title {
    position: relative;
}
.search-footer-btn {
    margin-bottom: 10px;
}
.customers-dropdown {
    width: 203px;
}
 option:hover{
    background-color:#00AAFF;
    color:white;
    
}
.breadcrumb {
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color: #f5f5f5;
    border-radius: 4px;
}
</style>
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Customers</li>
  </ol></nav>
<div class="card" style="margin-top: -20px;">
    <div class="title">
    <h3 class="title-heading" style="display:block;">Customers
      <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addcustomermodal">+ Customer</a>
  <a class="btn btn-primary pull-right" style="margin-right:4px;">Import/Export</a>
    
    </h3>
    
  
    
    </div>
    <hr/>
   
  

<div style="display:inline-block">
<div class="dropdown" style="margin-bottom:15px;">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="padding:8px 40px;">All Customers
  <span class="caret"></span></button>
  
  <ul class="dropdown-menu customers-dropdown" style="width:100%">
       <li> @if($users!=null)
       
                    @foreach($users as $user)
                    <option style="margin-left: 7px;" onclick="viewInfo({{$user->id}})" value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
                    @endforeach
                @endif</li>
    
  </ul>
  </div>
  </div>
  <button class="btn advanced-search-btn btn-primary" onclick="test()" style="margin-top: -7px;">Filter</button>
    <div class="col-sm-4 col-xs-12 seacrh-col" style="display: none">
        <div class="row">
            <div class="col-xs-12 search-col-header">
                <h4>Advanced Search</h4>
                <a href="#" class="close-col">CLOSE</a>
            
            
           
                
                <ul class="unstyled centered">
                    <li>
                        <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
                        <label for="styled-checkbox-1">Company</label>
                    </li>
                    
                    <li>
                        <input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value2">
                        <label for="styled-checkbox-2">Contact</label>
                    </li>
                    
                    <li>
                        <input class="styled-checkbox" id="styled-checkbox-3" type="checkbox" value="value3">
                        <label for="styled-checkbox-3">Country</label>
                    </li>
                    
                    <li>
                        <input class="styled-checkbox" id="styled-checkbox-4" type="checkbox" value="value4">
                        <label for="styled-checkbox-4">Declined</label>
                    </li>
                </ul>
                
            </div>
            
           <!-- <div class="col-xs-12 search-col-content">
                <h4>Pending</h4>
                
                <ul class="unstyled centered">
                    <li>
                        <input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="value5">
                        <label for="styled-checkbox-5">Not Pended</label>
                    </li>
                    
                    <li>
                        <input class="styled-checkbox" id="styled-checkbox-6" type="checkbox" value="value6">
                        <label for="styled-checkbox-6">Pended</label>
                    </li>
                    
                </ul>
                
            </div>-->
            
            <div class="col-xs-12  text-right">
                <a class="btn btn-primary" href="#" style=" margin: 7px;"> Submit </a>
            </div>
            
        </div>
    </div>
     <table id="customers">
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Berglunds snabbköp</td>
    <td>Christina Berglund</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Königlich Essen</td>
    <td>Philip Cramer</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
  <tr>
    <td>North/South</td>
    <td>Simon Crowther</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Paris spécialités</td>
    <td>Marie Bertrand</td>
    <td>France</td>
  </tr>
</table>
</div>
      
      
<!-- <select class="form-control" onchange="customerChange(this);" style="width:15%;margin-bottom:15px;">
                <option value="All">All Customers</option>
                @if($users!=null)
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
                    @endforeach
                @endif
              </select>-->
            
              

 

    
   
</div>

 <!-- <div class="col-md-4">
  <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Customers&nbsp;<a class="btn btn-primary" style="color:white;" data-toggle="modal" data-target="#addcustomermodal">+ Add</a></h3>
            
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 row12">
             
            </div>
          <div class="col-md-12 row12">
            <div class="input-group">
            <input class="form-control" type="text">
            <span class="input-group-btn"><button class="btn btn-primary" type="button">Search!</button></span>
          </div>
          </div>

          <div class="col-md-12 row12">
            <ul class="search-list">
                @if($users!=null)
                    @foreach($users as $user)
                    <li @if ($loop->first) class="active" @endif onclick="chooseCustomer(this);" style="cursor:pointer;" data-customer-id="{{$user->id}}">{{$user->fname}} {{$user->lname}}</li>
                    @endforeach
                @endif
           
            </ul>
          </div>
        </div>
    </div>
  </div>
</div>
-->
 <!-- <div class="col-md-8">
    <div class="panel panel-headline" style="background-color:#2b333e;">
        <div class="panel-heading">
            <h4 class="panel-title" style="color:white;font-size:19px;"><span id="view-customer-name">{{$first_user['fname']}} {{$first_user['lname']}}</span>
            <span class="panel-title-span edit-cust-span" onclick="editCustomer(this)" data-customer-id="{{$first_user['id']}}" style="cursor:pointer;"><i class="lnr lnr-pencil" style="color:#ffc150;"></i></span>
           
           <div style="
    display: inline-block;
    position: relative;
"><span class="panel-title-span" onclick="openDropdown(this)" style="cursor:pointer;"  type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h" style="color:#fff;"></i></span>
            
            
                <ul class="dropdown-menu view-cus-dropdown" data-customer-id="{{$first_user['id']}}">
    <li><a href="#" style="cursor:pointer;">Add Card</a></li>
    <li><a onclick="suspendUser(this);" style="cursor:pointer;">Suspend User</a></li>
    
  </ul></div>
  <div class="dropdown">
  </div></h4>
        </div>
        <div class="panel-body">
           <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <span class="info_span"><i class="fa fa-phone"></i><span id="view-customer-phone">{{$first_user['phone_no']}}</span></span><br>
                  <span class="info_span"><i class="fa fa-map-marker info_icons"></i><span id="view-customer-addr">{{$first_user['address']}}</span></span><br>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
            <div class="card-wrapper"></div>
            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-success chargebtn">Charge</button>

              </div>
            </div>
         <div class="form-container active" style="display:none;">
            <form action="" class="cardform">
                <input placeholder="Card number" id="cardnumber" value="4546 65xx xxxx xxxx" type="tel" name="number">
                <input placeholder="Full name" id="name" type="text" value="Yusuf MUTLU" name="name" >
                <input placeholder="MM/YY" id="expiry" type="tel" value="02/2022" name="expiry" >
                
            </form>
          </div>
        </div> 
      </div>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Transaction History</a></li>
        <li><a href="#tab2" data-toggle="tab">Notes</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade in active" id="tab1">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th><th>Name</th><th>Card</th><th>Username</th>
            </tr>
            </thead>
            <tbody>
              <tr><td>1</td><td>Steve</td><td><img src="{{ asset('images/visa-card.png') }}" class="cardimg"></td><td>@steve</td></tr>
              <tr><td>2</td><td>Simon</td><td><img src="{{ asset('images/master-card.png') }}" class="cardimg"></td><td>@simon</td></tr>
              <tr><td>3</td><td>Jane</td><td><img src="{{ asset('images/visa-card.png') }}" class="cardimg"></td><td>@jane</td></tr>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="tab2">
          <table class="table table-striped">
            <thead>
              <tr><th>#</th><th>Name</th><th>Card</th><th>Username</th></tr>
            </thead>
            <tbody>
              <tr><td>1</td><td>Steve</td><td><img src="{{ asset('images/visa-card.png') }}" class="cardimg"></td><td>@steve</td></tr>
              <tr><td>2</td><td>Simon</td><td><img src="{{ asset('images/master-card.png') }}" class="cardimg"></td><td>@simon</td></tr>
              <tr><td>3</td><td>Jane</td><td><img src="{{ asset('images/visa-card.png') }}" class="cardimg"></td><td>@jane</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>-->
  </div>
  
  
  
  
  <!--Add Customer Modal -->
<div id="addcustomermodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Customer</h4>
      </div>
      <form method="post" action="{{ route('add-customer') }}">
          @csrf
      
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
            </div>
            <div class="col-md-12">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
            </div>
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
            <div class="col-md-6">
                <label for="phone_no">Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_no">
            </div>
            <div class="col-md-12">
                <label for="address">Address</label>
                <textarea class="form-control" rows="4" cols="40" name="address"></textarea> 
            </div>
            
            <div class="col-md-4">
                <label for="state">State</label>
                <input type="text" class="form-control" placeholder="Enter State" name="state">
            </div>
            
            <div class="col-md-4">
                <label for="city">City</label>
                <input type="text" class="form-control" placeholder="Enter City" name="city">
            </div>
            
            <div class="col-md-4">
                <label for="zip">ZIP</label>
                <input type="number" class="form-control" placeholder="Enter ZIP" name="zip">
            </div>
            
            
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>





 <!--Update Customer Modal -->
<div id="updatecustomermodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Customer</h4>
      </div>
      <form method="post" action="{{ route('update-customer') }}">
          @csrf
       <input type="hidden" id="update-customer-id" name="id">
      
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="edit_fname">
            </div>
            <div class="col-md-12">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" id="edit_lname">
            </div>
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email" id="edit_email">
            </div>
            <div class="col-md-6">
                <label for="phone_no">Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_no" id="edit_phone">
            </div>
            <div class="col-md-12">
                <label for="address">Address</label>
                <textarea class="form-control" rows="4" cols="40" name="address" id="edit_addr"></textarea> 
            </div>
            
            <div class="col-md-4">
                <label for="state">State</label>
                <input type="text" class="form-control" placeholder="Enter State" name="state" id="edit_state">
            </div>
            
            <div class="col-md-4">
                <label for="city">City</label>
                <input type="text" class="form-control" placeholder="Enter City" name="city" id="edit_city">
            </div>
            
            <div class="col-md-4">
                <label for="zip">ZIP</label>
                <input type="number" class="form-control" placeholder="Enter ZIP" name="zip" id="edit_zip">
            </div>
            
            
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
@endsection

@section('scripts')
 
<script>

      $(document).ready(function(){
      $(".advanced-search-btn").click(function(){
          console.log('asdas');
          $('.seacrh-col').show(500);
      });
  });
  
  
    $(document).ready(function(){
  $(".close-col").click(function(){
      console.log('asdas');
      $('.seacrh-col').hide(500);
  });
});
  
  
  
  
  $(document).ready(function(){
    var card = new Card({
      form: '.cardform',
      container: '.card-wrapper' 
    });
    
         $.ajax({
        type: 'GET',
        url: "{{route('get-first-customer')}}",
        success:function(data)
        {
          if(data['data']!=null)
          {
          $('.jp-card-name').html(data['data']['fname']+' '+data['data']['lname']);
            $('.jp-card-name').addClass('jp-card-focused');  
          }
        }
        });
    $('.jp-card-number').html('4546 65xx xxxx xxxx');
    
    $('.jp-card').addClass('jp-card-visa');
    $('.jp-card').addClass('jp-card-identified');
    $('.jp-card-expiry').html('02/2022');
    $('#cardnumber').click();
    $('#name').click();
    $('#expiry').click();
  });
  
  
  function viewInfo(id){
      
      $.ajax({
        type: 'GET',
        url: "{{route('retrieve-customer')}}",
         dataType:'json',
        data:{
          'id':id
          'flag' : 'view'
        },
        success:function(data)
        {
            console.log(data);
        }
      });
  }
  
  function chooseCustomer(ele)
  {
      var cus_id = $(ele).attr('data-customer-id');
      
      $.ajax({
        type: 'GET',
        url: "{{route('retrieve-customer')}}",
         dataType:'json',
        data:{
          'id':cus_id
        },
        success:function(data)
        {
          if(data['data']!=null)
          {
            $('.search-list').children('li').removeClass('active');
            $('.edit-cust-span').attr('data-customer-id',cus_id);
            $('.view-cus-dropdown').attr('data-customer-id',cus_id);
            $('#view-customer-name').html('');
            $('#view-customer-name').html(data['data']['fname']+' '+data['data']['lname']);
            $('#view-customer-phone').html('');
            $('#view-customer-phone').html(data['data']['phone_no']);
            $('#view-customer-addr').html('');
            $('#view-customer-addr').html(data['data']['address']);
            $('.jp-card-name').html(data['data']['fname']+' '+data['data']['lname']);
            $('.jp-card-name').addClass('jp-card-focused');  
            $(ele).addClass('active');
          }
        }
        });
  }
  
  function editCustomer(ele)
  {
      var id = $(ele).attr('data-customer-id');
      console.log('ID',id);
      $('#update-customer-id').val(id);
       $.ajax({
        type: 'GET',
        url: "{{route('retrieve-customer')}}",
         dataType:'json',
        data:{
          'id':id
        },
        success:function(data)
        {
          if(data['data']!=null)
          {
              $('#edit_fname').val(data['data']['fname']);
              $('#edit_lname').val(data['data']['lname']);
              $('#edit_phone').val(data['data']['phone_no']);
              $('#edit_email').val(data['data']['email']);
              $('#edit_addr').html(data['data']['address']);
              $('#edit_state').val(data['data']['state']);
              $('#edit_city').val(data['data']['city']);
              $('#edit_zip').val(data['data']['zip']);
          }
        }
       });
      $('#updatecustomermodal').modal('show');
  }
  
  function suspendUser(ele)
  {
     var id = $(ele).parent().parent().attr('data-customer-id'); 

     bootbox.confirm({
    message: "Are you sure you want to suspend the user?",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        console.log('This was logged in the callback: ' + result);
        if(result==true)
        {
            $.ajax({
        type: 'GET',
        url: "{{route('delete-customer')}}",
         dataType:'json',
        data:{
          'id':id
        },
        success:function(data)
        {
            if(data['status']==1)
            {
                window.location.reload();
            }
        }
            });
        }
    }
});


  };
  

</script>
@endsection
