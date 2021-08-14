<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wili Wili Investment Site | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
    @if (session('login_username_error') or session('login_pass_error') )
        <div style="text-align: center;"  class="alert alert-danger" role="alert">
            <h3>{{session('login_username_error')}} {{session('login_Pass_error')}}</h3>
        </div>
    @endif
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="admin">
                @csrf
              <h1>Admin Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="username" name="username"/>
                <span style="color:red">@error ('username'){{$message}} @enderror</span>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password"  />
                <span style="color:red">@error ('password'){{$message}} @enderror</span>
              </div>
              <div>
                <input type="submit" value="Login" class="btn btn-default submit" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="/registration" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i>Wili Wili Investment Site!</h1>
                  <p>©2021 All Rights Reserved. Wili Wili Investment Site!.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>