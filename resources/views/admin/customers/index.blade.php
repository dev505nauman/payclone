@extends('layouts.admin')

@section('pagename')
Customers
@endsection

@section('content')
<div class="row">
  <div class="col-md-4">
  <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Customers</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 row12">
              <select class="form-control">
                <option value="All">All Customers</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
              </select>
            </div>
          <div class="col-md-12 row12">
            <div class="input-group">
            <input class="form-control" type="text">
            <span class="input-group-btn"><button class="btn btn-primary" type="button">Search!</button></span>
          </div>
          </div>

          <div class="col-md-12 row12">
            <ul class="search-list">
              <li class="active">John Doe</li>
              <li>John Doe</li>
              <li>John Doe</li>
              <li>John Doe</li>
              <li>John Doe</li>
              <li>John Doe</li>
            </ul>
          </div>
        </div>
    </div>
  </div>
</div>

  <div class="col-md-8">
    <div class="panel panel-headline" style="background-color:#2b333e;">
        <div class="panel-heading">
            <h4 class="panel-title" style="color:white;font-size:19px;">John Doe<span class="panel-title-span"><i class="lnr lnr-pencil" style="color:#ffc150;"></i></span><span class="panel-title-span"><i class="fa fa-ellipsis-h" style="color:#fff;"></i></span></h4>
        </div>
        <div class="panel-body">
           <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <span class="info_span"><i class="fa fa-phone"></i> (999)-999-999</span><br>
                  <span class="info_span"><i class="fa fa-map-marker info_icons"></i> Ap #867-859 Sit Rd. Azusa New York 39531</span><br>
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
    </div>
  </div>
@endsection

@section('scripts')
 
<script>
  $(document).ready(function(){
    var card = new Card({
      form: '.cardform',
      container: '.card-wrapper' 
    });
    console.log('test');
    $('.jp-card-number').html('4546 65xx xxxx xxxx');
    $('.jp-card-name').html('Yusuf MUTLU');
    $('.jp-card-name').addClass('jp-card-focused');
    $('.jp-card').addClass('jp-card-visa');
    $('.jp-card').addClass('jp-card-identified');
    $('.jp-card-expiry').html('02/2022');
    $('#cardnumber').click();
    $('#name').click();
    $('#expiry').click();
  });
</script>
@endsection
