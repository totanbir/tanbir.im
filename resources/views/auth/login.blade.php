<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('backend/logins.css')}}" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <title>Login page</title>
    
  </head>
  <body id="login_images">
    <!-- container -->
    <div class="container"> 
        <div class="row justify-content-md-center login_box">
            <div class="col-lg-4 col-sm-12 col-xl-4 col-md-4 ">
            <!--login head-->
             <h5 class="bg-danger text-center text-white">Blog Login</h5>
             <!-- login Form -->
                        <form method="POST" action="{{ route('login') }}" class="login_bg">
                        @csrf
                             <div class="form-group ">
                                <label for="colFormLabel" class="col-form-label col-form-label-sm" >Email:</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control form-control-md" data-container="body" data-toggle="popover" data-placement="top" data-content="admin@admin.gmail.com">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <div class="form-group ">
                                <label for="colFormLabel" class="col-form-label col-form-label-sm ">Password:</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" class="form-control form-control-md" placeholder="Password" id="colFormLabel" data-container="body" data-toggle="popover" data-placement="top" data-content="123456" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <button type="submit" class="btn btn-info btn-block p-2 mb-3">Login</button>
                        </form>
                        <!--# login Form -->
                        <!--login footer--> 
                        <div class="bg-danger login_footer text-center"> 
                            <a href="#" class="text-white"></a>
                        </div>
                        <!--# login footer-->                           
            </div>
        </div>
    </div>  
    <!-- # container -->

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script type="text/javascript"> 
    $(function () {
  $('[data-toggle="popover"]').popover()

})  

    </script>
  </body>
</html>






















