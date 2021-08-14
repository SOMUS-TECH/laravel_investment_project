@extends('admin_layout')

@section('content')


    <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Activation Fee receiver</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                  <form id="result_form" method="post" action="activationfee" class="form-horizontal form-label-left" novalidate>
                            @csrf
                      <span class="section">Update Who to receive activation fee</span>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Current Person <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="current" required="required" value=""  class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fullname" name="fullname" required="required"   class="form-control col-md-7 col-xs-12">
                          <span style="color:red">@error ('fullname'){{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Bank Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="bank_name" name="bank_name" required="required" class="form-control col-md-7 col-xs-12">
                          <span style="color:red">@error ('bank_name'){{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Account Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="account_number" name="account_number"  required="required" class="form-control col-md-7 col-xs-12">
                          <span style="color:red">@error ('account_number'){{$message}} @enderror</span>
                        </div>
                      </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset"  class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
    

    </div>

    <script>

    $(document).ready(function(){
		var d = 1;
        $.ajax({
            url:"/activation",
            method:"GET",
            data: {d:d},
            success:function(data)
            {
             // do nothing
                $('#current').val(data);
            }
        });

      });
   

</script> 

@endsection