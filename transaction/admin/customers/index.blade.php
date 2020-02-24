@extends('layouts.admin')

@section('pagename')
Customers
@endsection

@section('content')

<style>
.collapsing{
    width: 160px;
    float: right;
    top:335px !important;
    right:310px !important;
    position: absolute;
    right: 0px;
    top: 70px;
    z-index: 1;
}
.collapse{
    width: 160px;
    float: right;
     top:335px !important;
    right:310px !important;
    position: absolute;
    right: 0px;
    top: 70px;
    z-index: 1;
}
.collapse.in{
    width: 160px;
    float: right;
    top:335px !important;
    right:310px !important;
    position: absolute;
    right: 0px;
    top: 70px;
    z-index: 1;
}
.search-button {
    padding: 6px 12px;
}
.search-input {
    margin: 0px;
}
.search-input .form-control {
    width: 78%;
    display: inline-block;
    margin-left: 0px;
}
.dropdown {
    padding: 10px 10px 0px !important;
    width: 210px;
}
.dropdown-list {
    padding-left: 0px;
    margin: 0px;
    margin-left: 0px !Important;
}
.dropdown-list li {
    margin-bottom: 10px;
}
.dropdown-list li+li .btn {
    width: 100%;
    text-align: center;
}
#otherOptions {
    margin: -18px -209px 0px !important;
}
</style>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Customers</li>
    </ol>
</nav>
<div class="panel">
    <h3 class="panel-heading" style="display:block;">Customers</h3>
    <div class="panel-body">
        <button class='btn btn-warning' id="editBtn" onclick="editUser()">Edit</button>&nbsp;<button class='btn btn-danger' id="deleteBtn" onclick="deleteUser()">Delete</button>&nbsp;<button class='btn btn-success' id="mergeBtn" onclick="mergeUser();">Merge</button>
        <a class="btn btn-primary pull-right" style="margin-left:5px;" onclick="addCustomer()">Add Customer</a>
        <a class="btn btn-primary pull-right" data-toggle="collapse" href="#otherOptions" role="button" aria-expanded="false" aria-controls="otherOptions">Options</a>
            <div class="collapse" id="otherOptions" style="width: 160px;float: right; margin: -18px -260px 0px;">
                <div class="panel panel-body dropdown">
                    <ul class="unstyled centered dropdown-list" style="list-style-type:none; margin-left:-60px;">
                        <li>
                            <span class="search-input" style="margin-right:-15px;"><input type="text" class="form-control" id="search" placeholder="Search Contact"></span>
                            <a class="btn btn-primary search-button float-right" onclick="searchingContacts()"><i class="fa fa-search"></i></a>
                        </li>
                        <li>
                            <span class="search-input" style="margin-right:-15px;"><input type="text" class="form-control" id="search" placeholder="Search Contact"></span>
                            <a class="btn btn-primary search-button float-right" onclick="searchingContacts()">Location</a>
                        </li>
                        <li>
                            <span class="search-input" style="margin-right:-15px;"><input type="text" class="form-control" id="search" placeholder="Search Contact"></span>
                            <a class="btn btn-primary search-button float-right" onclick="searchingContacts()">Account No.</a>
                        </li>
                        <li>
                            <span class="search-input" style="margin-right:-15px;"><input type="text" class="form-control" id="search" placeholder="Search Contact"></span>
                            <a class="btn btn-primary search-button float-right" onclick="searchingContacts()">Terminal</a>
                        </li>
                        <li>
                            <span class="search-input" style="margin-right:-15px;"><input type="text" class="form-control" id="search" placeholder="Search Contact"></span>
                            <a class="btn btn-primary search-button float-right" onclick="searchingContacts()">Card No.</a>
                        </li>
                        <li>
                            <span class="search-input" style="margin-right:-15px;"><input type="text" class="form-control" id="search" placeholder="Search Contact"></span>
                            <a class="btn btn-primary search-button float-right" onclick="searchingContacts()">Batch Type</a>
                        </li>
                        <li>
                            <span class="search-input" style="margin-right:-15px;"><input type="text" class="form-control" id="search" placeholder="Search Contact"></span>
                            <a class="btn btn-primary search-button float-right" onclick="searchingContacts()">Date Selector</a>
                        </li>
                         <li>
                            <a class="btn btn-primary" style="margin-right:3px;" href="{{ url('/all-customers-csv')}}">Export</a>
                        </li>
                        <li>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#filter" style="margin-top:0px;margin-right:3px;">Filter</a>
                        </li>
                    </ul>
                </div>
            </div>
            <br><br>
            <div class="table-responsive">  <!--data-target="#delete-customer-modal" data-toggle="modal" -->
                <table id="customers" class="table table-hover">
                    <thead>
                        <tr style="background-color:#00aaff;color:white;" id="tableHeading">
                            <th><input id="mainCheckClass" onClick="checkboxesClick(this,0)" type="checkbox" value="00"></th>
                            <th class="fname_disp">First Name</th>
                            <th class="lname_disp">Last Name</th>
                            <th class="dob_disp">Date Of Birth</th>
                            <th class="email_disp">Email</th>
                            <th data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="float:right;"><i class="fa fa-plus"></i></th>
                        </tr>
                    </thead>
                    <div class="collapse" id="collapseExample" style="width: 160px;float: right; margin: 41px -260px 10px;">
                        <div class="panel panel-body">
                            <ul class="unstyled centered" style="list-style-type:none; margin-left:-60px;">
                                <li>
                                    <input class="styled-checkbox" id="selectAll" onChange="selectAll()" type="checkbox" checked>
                                    <label>Select All</label>
                                </li>
                                <li>
                                    <input class="styled-checkbox" id="fname_chk" onChange="showHideColumn()" type="checkbox" checked>
                                    <label>First Name</label>
                                </li>
                                <li>
                                    <input class="styled-checkbox" id="lname_chk" onChange="showHideColumn()" type="checkbox" checked>
                                    <label>Last Name</label>
                                </li>
                                <li>
                                    <input class="styled-checkbox" id="dob_chk" onChange="showHideColumn()" type="checkbox" checked>
                                    <label>Date Of Birth</label>
                                </li>
                                <li>
                                    <input class="styled-checkbox" id="email_chk" onChange="showHideColumn()" type="checkbox" checked>
                                    <label>Email</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <tbody id="customerData">
                        @if($users!=null)
                            @foreach($users as $user)
                                <tr id="user{{$user['id']}}">
                                    <td><input class="customCheckClass" type="checkbox" name="customCheck[]" onclick="checkboxesClick(this,1)" value="{{$user['id']}}"></td>
                                    <td class="fname_disp"><a href="{{route('customer-detail',['id'=>$user['id']])}}">{{$user['fname']}}</a></td>
                                    <td class="lname_disp"><a href="{{route('customer-detail',['id'=>$user['id']])}}">{{$user['lname']}}</a></td>
                                    <td class="dob_disp"><a href="{{route('customer-detail',['id'=>$user['id']])}}">{{$user['dob']}}</a></td>
                                    <td class="email_disp"><a href="{{route('customer-detail',['id'=>$user['id']])}}">{{$user['email']}}</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
    </div>
</div>

  </div>
  
   <!--filter Modal -->
<div id="filter" class="modal fade" role="dialog">
   <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Advanced Search</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="unstyled centered" style="list-style-type:none">
                            <li>
                                <input class="styled-checkbox" id="styled-checkbox-1" onclick="addField(this)" type="checkbox" value="value1">
                                <label for="styled-checkbox-1">First Name</label>
                                <input type="hidden" name="name" placeholder="Enter Text To Search" id="value1" class="form-control col-md-12"> 
                            </li>
                            <li>
                                <input class="styled-checkbox" id="styled-checkbox-2" onclick="addField(this)" type="checkbox" value="value2">
                                <label for="styled-checkbox-2">Email</label>
                                <input type="hidden" name="email" placeholder="Enter Text To Search" id="value2" class="form-control col-md-12">  
                            </li>
                            <li>
                                <input class="styled-checkbox" id="styled-checkbox-3" onclick="addField(this)" type="checkbox" value="value3">
                                <label for="styled-checkbox-3">Phone Number</label>
                                <input type="hidden" name="phone" placeholder="Enter Text To Search" id="value3" class="form-control col-md-12">  
                            </li>
                            <li>
                                <input class="styled-checkbox" id="styled-checkbox-4" onclick="addField(this)" type="checkbox" value="value4">
                                <label for="styled-checkbox-4">Date Of Birth</label>
                                <input type="hidden" name="dob" placeholder="Enter Text To Search" id="value4" class="form-control col-md-12">  
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="dynamicSearch()" type="button">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

  
  <!--Add Customer Modal -->
<div id="addcustomermodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Contact</h4>
      </div>
      <form method="post" action="{{ route('add-customer') }}">
          @csrf
      
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <label for="fname">Customer First Name</label>
                <!--<select class="form-control" name="user_id">-->
                <!--  @if($users!=null)-->
                <!--  @foreach($users as $user)-->
                <!--  <option value="{{$user['id']}}">{{$user['fname']}} {{$user['lname']}}</option>-->
                <!--  @endforeach-->
                <!--  @endif-->
                <!--</select>-->
                
                <input type="text" class="form-control" placeholder="Enter First Name" name="fname" required>
            </div>
            <div class="col-md-6">
                <label for="fname">Customer Last Name</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" required>
            </div>
            <div class="col-md-6">
                <label for="fname">Email</label>
                <input type="text" class="form-control" placeholder="Enter Email Address" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="phone_no">Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_no" required>
            </div>
                <div class="col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" placeholder="Enter City" name="city" required>
            </div>
                       <div class="col-md-6">
                <label for="state">State</label>
                <input type="text" class="form-control" placeholder="Enter State" name="state" required>
            </div>
            
            <div class="col-md-6">
                <label for="zip">ZIP</label>
                <input type="number" class="form-control" placeholder="Enter ZIP" name="zip" required>
            </div>
            <div class="col-md-12">
                <label for="address">Address</label>
                <textarea class="form-control" rows="4" cols="40" name="address" required></textarea> 
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



<!--delete customer modal-->

<div id="delete-customer-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Customer</h4>
      </div>
       <form method="post" action="{{ route('delete-customer') }}">
           <input type="hidden" name="id" id="delId">
          @csrf
      
      <div class="modal-body">
           <div class="row">
          <div class="col-md-12">
            Are you sure you want to delete?
          </div>
        </div>
          </div>
         <div class="modal-footer">
        <button type="submit" class="btn btn-success">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
      </form>
      </div>
      </div>
      </div>


<!--Merge customer modal-->

<div id="merge-customer-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Merge Customer</h4>
      </div>
       <form method="post" action="{{ route('merge-customer') }}">
           <input type="hidden" name="id" id="mergeId">
          @csrf
      
      <div class="modal-body">
           <div class="row">
          <div class="col-md-12">
            <b>Are you sure you want to merge contacts?</b></br><small class="muted">This cannot be undone in future!</small>
          </div>
        </div>
          </div>
         <div class="modal-footer">
        <button type="submit" class="btn btn-success">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
      </form>
      </div>
      </div>
      </div>
      
    
      
<!--Custom Fields modal-->

<div id="custom-field" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Column</h4>
      </div>
       <form method="post" action="{{ route('add-custom-column') }}">
           @csrf
           <input type="hidden" name="module" value="customers">
      <div class="modal-body">
          <div class="container-fluid">
           <div class="row">
            <label>Column Name</label>
            <input type="text" name="colName" class="form-control">
        </div>
        <div class="row">
            <label>Column Type</label>
            <select class="form-control" name="colType">
                <option value="1">text</option>
                <option value="2">number</option>
            </select>
        </div>
        </div>
          </div>
         <div class="modal-footer">
        <button type="submit" class="btn btn-success">Create</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss</button>
      </div>
      </form>
      </div>
      </div>
      </div>



@endsection

@section('scripts')

<script>
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


function addField(ele){
    var a = 0;
    a = $(ele).val();
    if(ele.checked){
        $("#"+a).attr('type','text');
    }
    else {
        $("#"+a).attr('type','hidden');
    }
}
</script>
 
<script>

      $(document).ready(function(){
          $('#deleteBtn').prop('disabled', true);
          $('#editBtn').prop('disabled', true);
          $('#mergeBtn').prop('disabled', true);
          
          $(".close-col").click(function(){
      $('.seacrh-col').hide(500);
  });
          
  });
  
  function viewInfo(id){
      
      $.ajax({
        type: 'GET',
        url: "{{route('retrieve-customer')}}",
         dataType:'json',
        data:{
          'id':id,
          'flag' : 'view',
        },
        success:function(data){
            console.log(data);
            $('#customerData').html('<tr><td>'+data['data']['fname']+'</td><td>'+data['data']['lname']+'</td><td>'+data['data']['dob']+'</td><td>'+data['data']['email']+'</td><td>'+data['data']['phone_no']+'</td><td>'+data['data']['address']+'</td></tr>');
        }
      });
  }
  
  
  function dynamicSearch(){
      
      var name = $('#value1').val();
      var email = $('#value2').val();
      var phone = $('#value3').val();
      var dob = $('#value4').val();
      
      $.ajax({
        type: 'GET',
        url: "{{route('dynamicSearch')}}",
         dataType:'json',
        data:{
            'name': name,
            'email': email,
            'phone': phone,
            'dob': dob,
        },
        success:function(data)
        {
            var i=0;
            var html = 0;
          if(data['data']!=null){
            for(i=0; i<data['data'].length; i++){
                html+="<tr><td><input class='customCheckClass' type='checkbox' name='customCheck[]' onclick='checkboxesClick(this,1)' value='"+data['data'][i]['id']+"'></td></td><td>"+data['data'][i]['fname']+"</td><td>"+data['data'][i]['lname']+"</td><td>"+data['data'][i]['dob']+"</td><td>"+data['data'][i]['email']+"</td><td>"+data['data'][i]['phone_no']+"</td><td>"+data['data'][i]['address']+"</td></tr>"; 
        }
            $('#customerData').html('');
            $('#customerData').append(html);
          }
          
          $('#filter').modal('toggle');
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
  
  /* nauman code */
function deleteUser()
{
    var delArray = new Array();
    $(".customCheckClass:checked").each(function(){
        delArray.push($(this).val());
    });
    $('#delId').val(delArray);
    $('#delete-customer-modal').modal('toggle');
    
}

function editUser()
  { 
        var id = 0;
        $(".customCheckClass:checked").each(function(){
           id = $(this).val();
        });
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
          $('#updatecustomermodal').modal('show');
        }
         });
        
  }
  
  function showHideColumn(){
      
      if ($('#fname_chk').is(':checked')){
        $('.fname_disp').show();
      }else $('.fname_disp').hide();
      
      if($('#lname_chk').is(':checked')){
        $('.lname_disp').show();
      }else $('.lname_disp').hide();
      
      if($("#dob_chk").is(':checked')){
        $('.dob_disp').show();
      }else $('.dob_disp').hide();
      
      if($("#email_chk").is(':checked')){
        $('.email_disp').show();
      }else $('.email_disp').hide();
      
      for(var i=1; i<=($('#sizeOfCustom').val()); i++){
          
          if($("#custom"+i).is(':checked')){
            $(".colHide"+i).show();
          }else {
              $(".colHide"+i).hide();
          }
      }
      
  }
  
  function mergeUser(){
      
     var delArray = new Array();
    $(".customCheckClass:checked").each(function(){
        delArray.push($(this).val());
    });
    
    $('#mergeId').val(delArray);
    $('#merge-customer-modal').modal('show');
  }
  
  function searchingContacts(){
      
      var search = $('#search').val();
      
      $.ajax({
        type: 'GET',
        url: "{{route('retrieve-searched-customer')}}",
         dataType:'json',
        data:{
          'search':search,
        },
        success:function(data){
            console.log(data);
            $('#customerData').html('<tr><td>'+data['data']['fname']+'</td><td>'+data['data']['lname']+'</td><td>'+data['data']['dob']+'</td><td>'+data['data']['email']+'</td><td>'+data['data']['phone_no']+'</td><td>'+data['data']['address']+'</td></tr>');
        }
      });
  }
  
  $("body").click(function(event) {
     var target = $(event.target);
    if (target.is ('ul') || target.is ('li') || target.is ('input') ) {
        $('#collapseExample').attr('class','collapse in');
    }
    else $('#collapseExample').attr('class','collapse');;
});


function selectAll(){
    
    if($('#selectAll').is(':checked')){
        $('#fname_chk').prop("checked", true);
        $('#lname_chk').prop("checked", true);
        $('#dob_chk').prop("checked", true);
        $('#email_chk').prop("checked", true);
        for(var i=1; i<=($('#sizeOfCustom').val()); i++){
          $("#custom"+i).prop("checked", true);
        }
        
    }
    else{
        $('#fname_chk').prop("checked", false);
        $('#lname_chk').prop("checked", false);
        $('#dob_chk').prop("checked", false);
        $('#email_chk').prop("checked", false);
        for(var i=1; i<=($('#sizeOfCustom').val()); i++){
          $("#custom"+i).prop("checked", false);
        }
    }
    
    showHideColumn();
}

function addCustomer(){
    $('#addcustomermodal').modal('show');
}

</script>

</script>
@endsection
