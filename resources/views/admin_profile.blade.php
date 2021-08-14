@extends('admin_layout')

@section('content')

@foreach(Session::get('userdetails') as $user)
              
@endforeach

<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      
                      <div class="clearfix"></div>

                      <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Admin</i></h4>
                            <div class="left col-xs-7">
                              <h2>{{$user->fullname}}</h2>
                              <p><strong>Username: </strong>{{$user->username}} </p>
                              <p><strong>Phone: </strong>{{$user->phone}} </p>
                              
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs" onclick="new PNotify({
                                  title: 'Admin Contact info',
                                  text: 'chat with via whatsapp, {{$user->phone}}',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm" onclick="new PNotify({
                                  title: 'Profile Edit Mode Activated',
                                  text: 'You are about to edit your profile',
                                  nonblock: {
                                                nonblock: true
                                            },
                                  styling: 'bootstrap3'
                              });"> 
                                <i class="fa fa-edit"> </i> Edit Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Small modal -->
                      <form id="profile">
                        @csrf
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Edit Profile</h4>
                        </div>
                        <div class="modal-body">
                            <h4>Personal Info</h4>
                            <div>
                                <input type="text" class="form-control" name="fullname" value="{{$user->fullname}}" placeholder="Full Name" required  />
                                <span style="color:red">@error ('fullname'){{$message}} @enderror</span>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Phone" required  />
                                <span style="color:red">@error ('phone'){{$message}} @enderror</span>
                            </div>
                            <div>
                                <input type="password" name="password" class="form-control" placeholder="Password" required />
                                <span style="color:red">@error ('password'){{$message}} @enderror</span>
                            </div>
                            <div>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required />
                                <span style="color:red">@error ('password') Is-Invalid @enderror</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="bntprofile" type="button" class="btn btn-primary">Save changes</button>
                        </div>

                        </div>
                    </div>
                    </div>
                    </form>
                    <!-- /modals -->
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

           <script>

$(document).ready(function(){

  $(document).on("click", "#bntprofile", function(){
  
   $.ajax({
    url:"/admin_profile",
    method:"POST",
    data: $('#profile').serialize(),
    success:function(data)
    {
        if(data == 1){
            new PNotify({
                                  title: 'Profile Edition',
                                  text: 'You have successfully edited your profile',
                                  type: 'success',
                                  nonblock: {
                                                nonblock: true
                                            },
                                  styling: 'bootstrap3'
                              });
        }else{

            new PNotify({
                                  title: 'Profile Edition',
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