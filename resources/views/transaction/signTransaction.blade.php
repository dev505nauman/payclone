<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Invoice</title>
        <!-- Custom CSS -->
    <link href="{{asset('libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('public/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="container">
    <div class="invoice-box" style="margin-top: 50px;">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                        
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                         <tr>
                            <td>
                               
                            </td>
                            
                            <td>
                         
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
 
            <tr class="total">
                <td>
                    <br><b>Digital Signature:</b> <a href="" style="border-bottom:1px solid black;text-decoration:none;padding-bottom:2px;">Click here to sign</a>
                </td>
                <td>
                   
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
<!--==============================================================================================================-->
<!--=============================================add signature modal start===============================================-->
<!--==============================================================================================================-->


<div class="modal" tabindex="-1" role="dialog" id="signature-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Digital Signature Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="" id="signature_form" enctype="multipart/form-data">
        <input type="hidden" id="imagename" name="imagename">
        <input type="hidden" name="invoice_id" value="">
        @csrf
         </form>
      <div class="modal-body">
         <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
         
      </div>
      <div class="modal-footer">
        <button id="save" class="btn btn-success">Save</button>
        
        <button id="clear" class="btn btn-default">Clear</button>

      </div>
 
    </div>
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function(){
     //   $('.launchbtn').click();
        $('#signature-modal').modal('show');
        console.log('test');

        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
           
          backgroundColor: 'rgba(255, 255, 255, 0)',
          penColor: 'rgb(0, 0, 0)',
          padding:0 0 0 0
        });
         console.log('abcc',signaturePad);
        var saveButton = document.getElementById('save');
        var cancelButton = document.getElementById('clear');

        saveButton.addEventListener('click', function (event) {
        //   var data = signaturePad.toDataURL('image/png');
        //  $('#imagename').val(data);
        //  $('#signature_form').submit();
        // Send data to server instead...
          //window.open(data);
         // window.location.replace("http://payclone.dev505.io/public/charge");
        });

        cancelButton.addEventListener('click', function (event) {
            console.log('test');
          signaturePad.clear();
        });

    });
    
</script>
</html>