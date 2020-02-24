@extends('layouts.admin')

@section('pagename')
Payfac
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
</style>


 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Payfac</li>
  </ol></nav>
<div class="panel">
    <h3 class="panel-heading" style="display:block;">Payfac
   <a class="btn btn-primary float-right" onclick="searchingContacts()">Search</a><span class="col-md-3 float-right" style="margin-right:-15px;"><input type="text" class="form-control" id="search" placeholder="Search Contact"></span>
    </h3>
  <div class="panel-body">
 <button class='btn btn-warning' id="editBtn" onclick="editUser()">Edit</button>&nbsp;<button class='btn btn-danger' id="deleteBtn" onclick="deleteUser()">Delete</button>
 <a class="btn btn-primary pull-right" style="margin-right:3px;" href="{{ url('/all-customers-csv')}}">Export</a>
 <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#filter" style="margin-top:0px;margin-right:3px;">Filter</a>
 
 <a class="btn btn-primary" style="float:right;color:white; margin: 0px 3px 0px 10px;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Column Selector</a>
    
    <div class="collapse" id="collapseExample" style="width: 160px;float: right; margin: -15px -100px 10px;">
          <div class="panel panel-body">
                             <ul class="unstyled centered" style="list-style-type:none; margin-left:-60px;">
                     <li>
                        <input class="styled-checkbox" id="selectAll" onChange="selectAll()" type="checkbox" checked>
                        <label for="styled-checkbox-1">Select All</label>
                    </li>
                    
                     <li>
                        <input class="styled-checkbox" id="bname" onChange="showHideColumn()" type="checkbox" checked>
                        <label for="styled-checkbox-1">Business Name</label>
                    </li>
                    
                    <li>
                        <input class="styled-checkbox" id="tid" onChange="showHideColumn()" type="checkbox" checked>
                        <label for="styled-checkbox-2">Tax Id</label>
                       
                    </li>
                    
                    <li>
                        <input class="styled-checkbox" id="dbaname" onChange="showHideColumn()" type="checkbox" checked>
                        <label for="styled-checkbox-3">Dba Name</label> 
                    </li>
                    
                    <li>
                        <input class="styled-checkbox" id="scode" onChange="showHideColumn()" type="checkbox" checked>
                        <label for="styled-checkbox-4">Sales Code</label>
                    </li>
                    <li>
                        <input class="styled-checkbox" id="ptype" onChange="showHideColumn()" type="checkbox" checked>
                        <label for="styled-checkbox-4">Partner Type</label> 
                    </li>
                    <li>
                        <input class="styled-checkbox" id="reportmid" onChange="showHideColumn()" type="checkbox" checked>
                        <label for="styled-checkbox-4">Reporting MID</label>
                    </li>
                    <li>
                        <input class="styled-checkbox" id="action_column" onChange="showHideColumn()" type="checkbox" checked>
                        <label for="styled-checkbox-4">Action</label>
                    </li>
                </ul>
            </div>
        </div>
    
    
    <br><br>
    <div class="table-responsive">
     <table class="table">
                        <thead>
                            <tr>
                                <th><input id="mainCheckClass" onClick="checkboxesClick(this,0)" type="checkbox" value="00"></th>
                                <th>Sr. No</th>
                                <th class="bname">Business Name</th>
                                <th class="tid">Tax Id</th>
                                <th class="dbaname">DBA Name</th>
                                <th class="scode">Sales Code</th>
                                <th class="ptype">Partner Type</th>
                                <th class="reportmid">Reporting MID</th>
                                <th class="action_column">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($payfac!=null)
                            @foreach($payfac as $user)
                            @if($user->status==0)
                            <tr id="user{{$user->id}}" style="background-color: rgb(255,255,255);">
                            @else
                            <tr id="user{{$user->id}}" style="background-color:white;">
                            @endif
                                <td><input class="customCheckClass" type="checkbox" name="customCheck[]" onclick="checkboxesClick(this,1)" value="{{$user['id']}}"></td>
                                <td>{{$loop->iteration}}</td>
                                <td class="bname">{{$user->legalBusinessName}}</td>
                                <td class="tid">{{$user->taxId}}</td>
                                <td class="dbaname">{{$user->dbaName}}</td>
                                <td class="scode">{{$user->salesCode}}</td>
                                <td class="ptype">{{$user->partnerType}}</td>
                                <td class="reportmid">{{$user->reportingMid}}</td>
                                <td class="action_column"><a title="View" onclick="viewMerchant(this)" style="cursor:pointer;"><i class="fa fa-eye"></i></a>&nbsp;
                                @if($user->status==1)
                                <a title="Ban" style="cursor:pointer;" onclick="banUser(this)"><i class="fa fa-ban" style="color:red"></i></a>
                                @else
                                <a title="Active" style="cursor:pointer;" onclick="activeUser(this)"><i class="fa fa-check-circle" style="color:#71c546"></i></a>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
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


@endsection

@section('scripts')
<script>

     $(document).ready(function(){
          $('#deleteBtn').prop('disabled', true);
          $('#editBtn').prop('disabled', true);
          $('#mergeBtn').prop('disabled', true);
          
  });
  
function selectAll(){
    
    if($('#selectAll').is(':checked')){
        $('#bname').prop("checked", true);
        $('#tid').prop("checked", true);
        $('#scode').prop("checked", true);
        $('#ptype').prop("checked", true);
        $('#dbaname').prop("checked", true);
        $('#action_column').prop("checked", true);
        $('#reportmid').prop("checked", true);
    }
    else{
        $('#bname').prop("checked", false);
        $('#tid').prop("checked", false);
        $('#scode').prop("checked", false);
        $('#ptype').prop("checked", false);
        $('#dbaname').prop("checked", false);
        $('#action_column').prop("checked", false);
        $('#reportmid').prop("checked", false);
    }
    
    showHideColumn();
}
    
function showHideColumn(){
    
      if ($('#bname').is(':checked')){
        $('.bname').show();
      }else $('.bname').hide();
      
      if($('#tid').is(':checked')){
        $('.tid').show();
      }else $('.tid').hide();
      
      if($("#scode").is(':checked')){
        $('.scode').show();
      }else $('.scode').hide();
      
      if($("#ptype").is(':checked')){
        $('.ptype').show();
      }else $('.ptype').hide();
      
      if($("#dbaname").is(':checked')){
        $('.dbaname').show();
      }else $('.dbaname').hide();
      
      if($("#reportmid").is(':checked')){
        $('.reportmid').show();
      }else $('.reportmid').hide();
       
      if($("#action_column").is(':checked')){
        $('.action_column').show();
      }else $('.action_column').hide();
          
  }
  
 $("body").click(function(event) {
     var target = $(event.target);
    if (target.is ('ul') || target.is ('li') || target.is ('input') ) {
        $('#collapseExample').attr('class','collapse in');
    }
    else $('#collapseExample').attr('class','collapse');;
});


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

</script>

@endsection



 
 
 
 
        
        
        
        
        
        
         