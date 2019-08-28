<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">

            <div class="col-md-4 col-4" style="border: 1px solid black; height:800px;">
               
                <p>Hello in first column</p>
                <div id="buttonn"> 

            <section class="row" style="border: 1px solid black; height:80px;">Hello thhis is a test section  <input type="text" name=""> </section>
              </div>
                
            </div>

            <div class="col-md-8 col-8" style="border: 1px solid black; height:800px;">

                <div class="row" style="border: 1px solid black; height: 300px;">
                    <div id="row1" >
                      1 
                    </div>
                    
                </div>                


                <div class="row"  style="border: 1px solid black; height: 300px;">
                    <div id="row2" >
                      2 
                    </div>
                </div>                


                <div class="row"  style="border: 1px solid black; height: 200px;">
                   <div id="row3" >
                      3
                    </div>
                </div>                



                </div>
        
        </div>
            
        </div>
    </body>


  </html>

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>


  
         $(function() {
            $( "#buttonn" ).draggable({cancel:false});
            $( "#row1" ).droppable({
      drop: function( event, ui ) {
        console.log('aa');

        var html = $('#buttonn').html();
        console.log('html',html);
        $( this )
          .addClass( "row1" )
          .find( "p" )
            .html( "Dropped!" );
      }
    });
         });



  //   function drag(){

  //       alert("hello");

  //       $( "#buttonn" ).draggable();
  //   $( "#row1" ).droppable({
  //     drop: function( event, ui ) {
  //       $( this )
  //         .addClass( "ui-state-highlight" )
  //         .find( "p" )
  //           .html( "Dropped!" );
  //     }
  //   });
  // }

   

  
  </script>
