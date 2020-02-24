@extends('layouts.admin')

@section('pagename')
New
@endsection

@section('content')

 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Contacts</li>
  </ol></nav>
<div class="panel">
    <h3 class="panel-heading" style="display:block;">Contact Details
 <!--     <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addcustomermodal">+ Customers Contacts</a>-->
 <!-- <a class="btn btn-primary pull-right" style="margin-right:3px;" href="{{ url('/all-customers-csv')}}">Export</a>-->
 <!--<a class="btn btn-primary pull-right" data-toggle="modal" data-target="#filter" style="margin-top:0px;margin-right:3px;">Filter</a>-->
    </h3>
  <div class="panel-body">
 <button class='btn btn-warning' id="editBtn" onclick="editUser();">Edit</button>&nbsp;<button class='btn btn-danger' id="deleteBtn" onclick="deleteUser();">Delete</button><br><br>
    <div class="table-responsive">  <!--data-target="#delete-customer-modal" data-toggle="modal" -->
     <table id="customers" class="table table-hover">
  <tr style="background-color:#00aaff;color:white;">
    <th><input id="mainCheckClass" onClick="checkboxesClick(this,0)" type="checkbox" value="00"></th>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Zip</th>
  </tr>
  <tbody id="customerData">
      
        @if($contacts!=null)
                    @foreach($contacts as $contact)
                    <tr id="contact{{$contact['contact_id']}}">
                        <td><input class="customCheckClass" type="checkbox" name="customCheck[]" onclick="checkboxesClick(this,1)" value="{{$contact['contact_id']}}"></td>
                        <td>{{$contact['fname']}} {{$contact['lname']}}</td>
                        <td>{{$contact['phone_no']}}</td>
                        <td>{{$contact['address']}}</td>
                        <td>{{$contact['city']}}</td>
                        <td>{{$contact['state']}}</td>
                        <td>{{$contact['zip']}}</td>
                    </tr>
                    @endforeach
                @endif

  </tbody>
</table>
</div>
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
      <form method="post" action="{{ route('add-customer-contact') }}">
          @csrf
      
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label for="fname">Choose Customer</label>
                <select class="form-control" name="user_id">
                  <option value=""></option>
                </select>
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
      <form method="post" action="{{ route('update-contact') }}">
          @csrf
       <input type="hidden" id="update-customer-id" name="id">
      
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <label for="phone_no">Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_no" id="edit_phone">
            </div>
            
                       
            <div class="col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" placeholder="Enter City" name="city" id="edit_city">
            </div>
            
            <div class="col-md-6">
                <label for="state">State</label>
                <input type="text" class="form-control" placeholder="Enter State" name="state" id="edit_state">
            </div>
            
            <div class="col-md-6">
                <label for="zip">ZIP</label>
                <input type="number" class="form-control" placeholder="Enter ZIP" name="zip" id="edit_zip">
            </div>
            
                        <div class="col-md-12">
                <label for="address">Address</label>
                <textarea class="form-control" rows="4" cols="40" name="address" id="edit_addr"></textarea> 
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
        <h4 class="modal-title">Delete Contact</h4>
      </div>
       <form method="post" action="{{ route('delete-contact')}}" name="deleteForm">
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

@endsection

@section('scripts')

<script>
function checkboxesClick(ele,flag){
        if(flag == 0){
            if(ele.checked){
                $('.customCheckClass').prop("checked", true);
                $('#deleteBtn').prop('disabled', false);
            }else{
                $('.customCheckClass').prop("checked", false);
                $('#deleteBtn').prop('disabled', true);
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
            }else if(len > 1){
                $('#deleteBtn').prop('disabled', false);
                $('#editBtn').prop('disabled', true);
            }else{
                $('#deleteBtn').prop('disabled', true);
                $('#editBtn').prop('disabled', true);
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
          
  });
  
  
    $(document).ready(function(){
  $(".close-col").click(function(){
      console.log('asdas');
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
        url: "{{route('retrieve-contact')}}",
         dataType:'json',
        data:{
          'id':id
        },
        success:function(data)
        {
            console.log(data);
          if(data['data']!=null)
          {
              $('#edit_phone').val(data['data']['phone_no']);
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
    $('#delete-customer-modal').modal('show');
    
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
        url: "{{route('retrieve-contact')}}",
         dataType:'json',
        data:{
          'id':id
        },
        success:function(data)
        {
            // console.log(data,"dataa");
             if(data['data']!=null)
          {
              $('#edit_phone').val(data['data']['phone_no']);
              $('#edit_addr').html(data['data']['address']);
              $('#edit_state').val(data['data']['state']);
              $('#edit_city').val(data['data']['city']);
              $('#edit_zip').val(data['data']['zip']);
          }
          $('#updatecustomermodal').modal('show');
        }
         });
        
  }
  

</script>

@endsection
