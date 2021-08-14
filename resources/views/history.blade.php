@extends('user_layout')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Investment(s) History <small>table</small></h2>
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
                     The List of Your Investment(s) History, Always Chech your pay-to table to Know when you're matched to make payment because failure to make payment on time attract some penalties
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Reference Code</th>
                          <th>Amount</th>
                          <th>Amount To Received</th>
                          <th>Date</th>
                          <th>Balance</th>
                        </tr>
                      </thead>


                      <tbody>

                      <x-historyComponent />

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


              <!-- Small modal -->
              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Add Investment</h4>
                        </div>
                        <div class="modal-body">
                            <h4>All Amount is in Naira </h4>
                           
                            <div>
                                <input type="number" name="amount_deposit" class="form-control amount_deposit" id="amount_deposit" placeholder="Amount" require/>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" id="addInvest_bnt" class="btn btn-primary">Send</button>
                        </div>

                        </div>
                    </div>
                    </div>
                    <!-- /modals -->

<script>

            $(document).ready(function(){

                  $(document).on("click", "#addInvest_bnt", function(){
                   var amount_deposit = $('#amount_deposit').val();  
                   $('#addInvest_bnt').attr("disabled", true);
                
                  $.ajax({
                    url:"/addInvestment",
                    method:"GET",
                    data:{amount_deposit:amount_deposit},
                    success:function(data)
                    {
                    
                     new PNotify({
                                  title: 'Admin Contact info',
                                  text: data,
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });

                      setTimeout(location.reload(true),6000000);
                      $('#addInvest_bnt').attr("disabled", false);
                    }
                  });
                  
                
                });

                


            });
 
</script>

    </div>
</div>

@endsection