<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>
  

        <div class="container">
            <div>
                @foreach ($errors as $item)
                    {{$item}}
                @endforeach
            </div>
            <form id = "submit_form">
                {{csrf_field()}}
                <br>
                <label for="name"> Name</label>
                <input type="text" name="name" id="name" class="form-control">
                <div id="countryList">
                </div>
                <br>
                <label for="message"> Message</label>
                <textarea type="text" name="message" id="message" class="form-control"></textarea>
                <br>
                <input type="button" value="Submit" id="submit" name ="submit" class="btn btn-success">
                <span id="error_message" class="text-danger"></span>
                <span id="success_message" class="text-success"></span>
            </form>
        </div>

        <div class="container"> 
            <div class="col-6">
                <br>
                <label for="num1">Number 1</label>
                    <input id="num1" class="form-control" name="num1" type="number" value="" placeholder="Enter number 1">
                
                <label for="num2">Number 2</label>
                    <input id="num2" class="form-control" name="num2" type="number" value="" placeholder="Enter number 2">
                
                <label for="res">Result</label>
                    <input id="result" class="form-control" name="res" type="number" value="" placeholder="Result">
                
            </div>
        </div>
        <br>
        <div class="container">
            <table id="table1" class="table">
                <tr>
                        <th>Name</th>
                        <th>Message</th>
                </tr>
               
            </table>
        </div>
        <script>
                $('document').ready(function(){
                    $('#table1').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": "{{ route('employees.getdata') }}",
                        "columns":[
                            { "data": "name" },
                            { "data": "message" }
                            ]
                     });
                    $('#submit').click(function()
                    {
                        var name = $('#name').val();
                        var message = $('#message').val();
                        
                        var _token = $('input[name="_token"]').val();
                       
                        if(name == '' || message == '')
                        {
                            $('#error_message').html('All Fields are required');
                        }
                        else
                        {

                            $.ajax({
                                url:"{{ route('employees.add_employee') }}",
                                method:"POST",
                                data:{name:name, message:message, _token:_token },
                                success:function(result)
                                {
                                    $("form").trigger("reset");
                                    $('#success_message').fadeIn().html(result);
                                    setTimeout(function(){
                                        $('#success_message').fadeOut("slow");
                                    }, 2000);
                                }
                    
                                });
                        }
                });
                $('#num2').keyup(function(){
                    var num1 = parseInt($('#num1').val());
                    var num2 = parseInt($('#num2').val());
                    
                    var result = num1+num2;
                    
                    $('#result').val(result);
                });

                $('#name').keyup(function(){ 
                    var query = $(this).val();
                    if(query != '')
                    {
                     var _token = $('input[name="_token"]').val();
                     $.ajax({
                      url:"{{ route('autocomplete.fetch') }}",
                      method:"POST",
                      data:{query:query, _token:_token},
                      success:function(data){
                       $('#countryList').fadeIn();  
                                $('#countryList').html(data);
                      }
                     });
                    }
                });
                
            });
        </script>

</body>
</html>

