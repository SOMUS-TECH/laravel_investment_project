@extends('admin_layout')

@section('content')


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Ban <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Fullname</th>
                          <th>Email</th>
                          <th>Bank Name</th>
                          <th>Account Number</th>
                          <th>Phone</th>
                          <th>Reasons</th>
                          <th>Unlock</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <x-unlockComponent />
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

    </div>



    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of No Testimony Yet <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p>
                    <table id="datatable-responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Fullname</th>
                          <th>Email</th>
                          <th>Bank Name</th>
                          <th>Account Number</th>
                          <th>Phone</th>
                          <th>Reasons</th>
                          <th>Unlock</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <x-testimonyComponent />
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

    </div>

    <script>

$(document).ready(function(){

  $(document).on("click", ".unban", function(){
    var d =  $(this).val();
   
   $.ajax({
    url:"/unban",
    method:"GET",
    data: {d:d},
    success:function(data)
    {
      if(data == 1){
            new PNotify({
                                  title: 'User Account Unban',
                                  text: 'You have successfully Unban this Account',
                                  type: 'success',
                                  nonblock: {
                                                nonblock: true
                                            },
                                  styling: 'bootstrap3'
                              });
        }else{

            new PNotify({
                                  title: 'User Account Unban',
                                  text: data,
                                  type: 'success',
                                  nonblock: {
                                                nonblock: true
                                            },
                                  styling: 'bootstrap3'
                              });
        }

    }
   });
      
 
 });

});




$(document).ready(function(){

$(document).on("click", ".test", function(){
  var d =  $(this).val();
 
 $.ajax({
  url:"/test",
  method:"GET",
  data: {d:d},
  success:function(data)
  {
    if(data == 1){
          new PNotify({
                                title: 'User Account Unban',
                                text: 'You have successfully Unban this Account',
                                type: 'success',
                                nonblock: {
                                              nonblock: true
                                          },
                                styling: 'bootstrap3'
                            });
      }else{

          new PNotify({
                                title: 'User Account Unban',
                                text: data,
                                type: 'success',
                                nonblock: {
                                              nonblock: true
                                          },
                                styling: 'bootstrap3'
                            });
      }

  }
 });
    

});

});

</script> 

@endsection