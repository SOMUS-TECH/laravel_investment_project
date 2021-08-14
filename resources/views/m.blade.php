@extends('admin_layout')

@section('content')

<div class="row" >
<div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Basic Elements <small>different form elements</small></h2>
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
                    <br />
                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Default Input">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Custom</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1">
                            <option></option>
                            <option value="AK">Alaska</option>
                          </select>
                        </div>
                      </div>
                      
                      

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Switch</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch"  /> favour Users
                            </label>
                          </div>
                          
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
</div>
<script>

$(document).ready(function(){
    
    if ($("input[type=checkbox]").prop(":checked")) {
        var d = 1;
        }else{
            var d = 0;
        }
   $.ajax({
    url:"/flistormlist",
    method:"GET",
    data: {d:d},
    success:function(data)
    {
      if(data == 1){
            new PNotify({
                                  title: 'User Account Switch',
                                  text: 'You have successfully switched this account to favour users',
                                  type: 'success',
                                  nonblock: {
                                                nonblock: true
                                            },
                                  styling: 'bootstrap3'
                              });
        }else{

            new PNotify({
                                  title: 'User Account Switch',
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


$(document).ready(function(){

 $(document).on("change", ".favours2", function(){
  var d =  $(this).val();
  var t = 2;
 $.ajax({
  url:"/addtofavour",
  method:"GET",
  data: {d:d,t:t},
  success:function(data)
  {
    if(data == 1){
          new PNotify({
                                title: 'User Account Switch',
                                text: 'You have successfully switched this account to Regular users',
                                type: 'success',
                                nonblock: {
                                              nonblock: true
                                          },
                                styling: 'bootstrap3'
                            });
      }else{

          new PNotify({
                                title: 'User Account Switch',
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

$(document).on("click", ".del", function(){
  var d =  $(this).val();
  var t = 1;
 $.ajax({
  url:"/del",
  method:"GET",
  data: {d:d,t:t},
  success:function(data)
  {
    if(data == 1){
          new PNotify({
                                title: 'Account Deletion',
                                text: 'You have successfully deleted this account',
                                type: 'success',
                                nonblock: {
                                              nonblock: true
                                          },
                                styling: 'bootstrap3'
                            });
      }else{

          new PNotify({
                                title: 'Account Deletion',
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