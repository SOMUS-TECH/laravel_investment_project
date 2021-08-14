<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Investment Registrarion | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <script src="build/js/jquery.min.js"></script>
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>


  <body class="login">

  @if (session('registration'))
        <div style="text-align: center;" class="alert alert-success">
            <h3>{{session('registration')}} Your Registration Was Successful</h3>
        </div>
    @endif

    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <form method="post" action="registration">
              @csrf
              <h1>Create Account</h1>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
                <span style="color:red">@error ('email'){{$message}} @enderror</span>
              </div>
              <div>
                <input type="text" class="form-control" name="address" placeholder="Address" required />
                <span style="color:red">@error ('address'){{$message}} @enderror</span>
              </div>
              <div>
                  <label>Gender</label>
                <select class="form-control" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Others</option>
                </select>
              </div>
              <div>
                  <label>DOB</label>
                <input type="date" class="form-control" name="dob" value="{{ old('dob')}}" place required />
                <span style="color:red">@error ('dob'){{$message}} @enderror</span>
              </div> <br />
              <div>
                <input type="text" name="bank_name" class="form-control" value="{{old('bank_name')}}" placeholder="bank_name" required />
                <span style="color:red">@error('bank_name'){{$message}} @enderror</span>
              </div>
              <div>
                <input type="number" name="phone" class="form-control" placeholder="Phone Number" required />
                <span style="color:red">@error ('phone'){{$message}} @enderror</span>
              </div><br />
              <div>
                <input type="text" class="form-control" id="bank_code" name="bank_code" placeholder="Bank Code Eg 033" required />
              </div>
              <div>
                <input type="text" name="account_number" class="form-control account_number" id="account_number" placeholder="Account Number" />
                <span style="color:red">@error ('account_number'){{$message}} @enderror</span>
              </div>
              
              <div>
                <input type="text" class="form-control" name="fullname" placeholder="Full Name" required  />
                <span style="color:red">@error ('fullname'){{$message}} @enderror</span>
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required />
                <span style="color:red">@error ('password'){{$message}} @enderror</span>
              </div>
              <div>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required />
                <span style="color:red">@error ('password') Is-Invalid @enderror</span>
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" value="Sign Up" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="/login" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Wili Wili Investment!</h1>
                  <p>©2021 All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>

    <!-- <script>

    $(document).ready(function(){

      $(document).on("blur", "#account_number", function(){
      var account_number = $('#account_number').val();  
      let bank_code   = $('#bank_code').val();  
    
      $.ajax({
        url:"/Account_verification",
        method:"GET",
        data:{account_number:account_number, bank_code:bank_code},
        success:function(data)
        {
        
          alert(data);

        }
      });

    
    });

    });
    
    </script> -->