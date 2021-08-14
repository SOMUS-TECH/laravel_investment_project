@extends('admin_layout')

@section('content')
   <!-- page content -->
   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin Dashboard</h2>
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
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count" id="users"> </div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Ban Accounts</span>
              <div class="count" id="ban"> </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-spinner fa-spin"></i> Pending Deposit</span>
              <div class="count green" id="pen"> </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
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
            url:"/countuser",
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
            url:"/countban",
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
            url:"/countpen",
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