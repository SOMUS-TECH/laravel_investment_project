@extends('user_layout')

@section('content')
   <!-- page content -->
   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Dashboard</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
   <div>
       
     <!-- top tiles -->
     <div class="row tile_count">
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Investment</span>
              <div class="count" id="users"> </div>
              <span class="count_bottom"><i class="green">Your total</i> From Day one</span>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> People to Pay to</span>
              <div class="count" id="ban"> </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Current </i> Number of people you should pay to</span>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-spinner fa-spin"></i> Pending Deposit</span>
              <div class="count green" id="pen"> </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Your </i> Current Pending Deposit(s)</span>
            </div>
          </div>

   </div>

   </div>
                </div>
              </div>
            </div>
            <!-- /row -->
          <!-- /top tiles -->
    <!-- /page content -->


    <script>
    $(document).ready(function(){
		  var d = 1;
        $.ajax({
            url:"/ucountuser",
            method:"GET",
            data: {d:d},
            success:function(data)
            {
             $('#users').html(data);

            }
        });

      });

      $(document).ready(function(){
		  var d = 1;
        $.ajax({
            url:"/ucountban",
            method:"GET",
            data: {d:d},
            success:function(data)
            {
              $('#ban').html(data);
            }
        });

      });


      $(document).ready(function(){
		  var d = 1;
        $.ajax({
            url:"/ucountpen",
            method:"GET",
            data: {d:d},
            success:function(data)
            {
              $('#pen').html(data);

            }
        });

      });
    </script>
@endsection