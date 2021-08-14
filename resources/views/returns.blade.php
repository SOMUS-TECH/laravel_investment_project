@extends('user_layout')

@section('content')

<script>
    function counter(id ,enddate){
          // Set the date we're counting down to
          var countDownDate = new Date(enddate).getTime();

          // Update the count down every 1 second
          var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById(id).innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
              clearInterval(x);
              document.getElementById(id).innerHTML = "EXPIRED";
            }
          }, 1000);

        }

       
</script>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Return Of Investment(s) <small>Table</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      List of people matched to pay you
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Time Left</th>
                          <th>Refference</th>
                          <th>Amount to Receive</th>
                          <th>Who to pay You</th>
                          <th>Phone</th>
                          <th>Start Date</th>
                          <th>End Date.</th>
                          <th>Confirm Payment</th>
                          <th>View Prove of Transaction</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <x-returnsComponent />
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

    </div>

        <script>

    $(document).ready(function(){

       $(document).on("click", "#confirm", function(){
        var d = $('#rowid').val();   
    
        $.ajax({
          url:"/confirm",
          method:"GET",
          data:{d:d},
          success:function(data)
          {
          
            new PNotify({
                                  title: 'Confirmation of Transaction',
                                  text: 'You have confirmed that you received the money in good condition(s)',
                                  nonblock: {
                                                nonblock: true
                                            },
                                  styling: 'bootstrap3'
                              });

           

          }
        });
       });


    });
    
    </script> 

@endsection