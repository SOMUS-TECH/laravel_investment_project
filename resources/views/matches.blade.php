@extends('admin_layout')

@section('content')


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Merited <small>Users</small></h2>
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
                          <th>Email</th>
                          <th>Amount Deposited</th>
                          <th>Balance</th>
                          <th>Amount to Recevie</th>
                          <th>Date</th>
                          <th>Refference ID</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Matche Button</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <x-depositComponent />
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>



              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of favoured <small>Users</small></h2>
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
                          <th>fullname</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Gender</th>
                          <th>DOB</th>
                          <th>Bank Name</th>
                          <th>Account Number</th>
                          <th>Phone</th>
                          <th>Match Button</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <x-favourMatcheComponent />
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

    </div>

    
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Matching Model</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Match Users to Make Deposit</h4>
                          <form class="form-horizontal form-label-left" id="matchingform" name="matchingform">

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount to Deposit</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount to Deposit">
                                    <input type="hidden" value="" name="receiver_id" id="receiver_id" />
                                    <input type="hidden" value="" name="favour_id" id="favour_id" />
                                  </div>
                                </div>
                              
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">List of People to Make Deposit</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select id="depolist" class="select2_single form-control" tabindex="-1" name="giver_id">
                                      <option></option>
                                    </select>
                                  </div>
                                </div>
                                
                               


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-success" id="send" class="send">Submit</button>
                                  </div>
                                </div>

                    </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>

    <script>

    $(document).ready(function(){
      
    $(document).on("click", "#send", function(){
      event.preventDefault();
      
    $.ajax({
      url:"/match",
      method:"GET",
      data: $('#matchingform').serialize(),
      success:function(data)
      {
       
        if(data == 1){
          new PNotify({
                                title: 'Matching Users',
                                text: 'You have successfully Matched this Investment',
                                type: 'success',
                                nonblock: {
                                              nonblock: true
                                          },
                                styling: 'bootstrap3'
                            });
      }else{

          new PNotify({
                                title: 'Matching Users',
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

        $(document).on("click", ".matches", function(){
            var d =  $(this).val();
          $.ajax({
              url:"/awaitingMatches",
              method:"GET",
              data: {d:d},
              success:function(data)
              {
                $("#depolist").html(data);
                $("#receiver_id").val(d);
                $("#favour_id").val(0);
                
              }
          });
            

        });

    });


    $(document).ready(function(){

      $(document).on("click", ".matchesfavour", function(){
          var d =  $(this).val();
        $.ajax({
            url:"/awaitingMatches",
            method:"GET",
            data: {d:d},
            success:function(data)
            {
              $("#depolist").html(data);
              $("#receiver_id").val(d);
              $("#favour_id").val(1);

            }
        });
          

      });

});
</script> 

@endsection