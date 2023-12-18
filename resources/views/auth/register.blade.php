<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create Account</title>

    <!-- Bootstrap -->
    <link href="/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form action="{{route('register')}}" method="POST">
              @csrf
              <h1>Create Account</h1>
              <div>
                <input type="text" name="login" class="form-control" placeholder="Login" required />
              </div>
              <div>
                <input type="text" name="first_name" class="form-control" placeholder="Firtsname" required />
              </div>
              <div>
                <input type="text" name="last_name" class="form-control" placeholder="Lastsname" required />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
               <div>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required="" />
              </div>
              <div>
                <button class="btn btn-default submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="{{route('login')}}" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
               
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
