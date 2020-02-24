@extends('admin.settings.settings2')

@section('settingContent')
   
    <div class="panel panel-headline" style="margin-top:50px; width:70%; margin:50px auto 0px;">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="display:inline-block;">Manage Account Details</h2>
                    <button class="btn btn-primary float-right" style="margin-top:10px;" data-toggle="modal" data-target="#changePass">Change Password</button>
                </div>
            
          <form class="cardform">
              @csrf
                  <div class="col-md-6 bars">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" name="name">
                  </div>
                  <div class="col-md-6 bars">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" name="fname">
                  </div>
                  <div class="col-md-6 bars">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email">
                  </div>
                  
                  <div class="col-md-6 bars">
                      <label for="dob">Date Of Birth</label>
                      <input type="date" class="form-control" name="dob">
                  </div>
                  
                  <div class="col-md-6 bars">
                      <label for="phone">Phone</label>
                      <input type="number" class="form-control" name="phone">
                  </div>
                  
                  <div class="col-md-6 bars">
                      <label for="address">Address</label>
                      <input type="text" class="form-control"name="address">
                  </div>
                  
                   <div class="col-md-4 bars">
                      <label for="city">City</label>
                      <input type="text" class="form-control" name="city">
                  </div>
                  
                   <div class="col-md-4 bars">
                      <label for="state">State</label>
                      <input type="text" class="form-control" name="state">
                  </div>
                  
                   <div class="col-md-4 bars">
                      <label for="zip">Zip</label>
                      <input type="text" class="form-control" name="zip">
                  </div>
                    
                    <div class="col-md-12 text-right">
                      <input type="submit" class="btn btn-primary" name="submit">
                  </div>
                      
            </form>
        
              </div>

        </div>
       
    </div>

<!-- Modal Code Start -->

<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="container-fluid" style="width:90%;">
            <div class="modal-content" style="display:inline-block;">
                <div class="modal-header"  style="background-color:#5bc0de;">
                    <h5 class="modal-title text-center" style="color:white; font-size:25px;">Change Your Password Here</h5>
                </div>
                <div class="modal-body">
                    <form class="cardform">
                        @csrf
                    <div class="col-md-12 bars">
                      <label for="old">Old Password</label>
                        <input type="text" class="form-control" name="oldPass" required>
                      </div>
                      <div class="col-md-12 bars">
                          <label for="new">New Password</label>
                          <input type="text" class="form-control" name="newPass" required>
                      </div>
                      <div class="col-md-12 bars">
                          <label for="confirmNew">Confirm New Password</label>
                          <input type="text" class="form-control" name="confirmNewPass" required>
                      </div>
                      <div class="col-md-12 bars text-right">
                          <input type="submit" class="btn btn-primary" name="Submit">
                      </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Code Ends Here -->

@endsection
