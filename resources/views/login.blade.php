<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="nodeAssets/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="nodeAssets/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="nodeAssets/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png"/>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
        <div class="row">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-dark text-left p-5">
                            <h2>Login</h2>
                            <h4 class="font-weight-light">Hello! let's get started</h4>

                            <form class="pt-5" action="{{route('login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">User Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" placeholder="Username"
                                           value="{{old('name')}}" autofocus>
                                    <i class="mdi mdi-account"></i>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           placeholder="Password">
                                    <i class="mdi mdi-eye"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-block btn-rounded  btn-lg font-weight-medium"
                                            href="/dashboard" style="background-color:#1b7e5a">Login
                                    </button>
                                </div>
                                {{--        <div class="mt-3 text-center">
                                            <a href="#" class="auth-link text-white">Forgot password?</a>
                                        </div>
                                --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="nodeAssets/jquery/dist/jquery.min.js"></script>
<script src="nodeAssets/popper.js/dist/umd/popper.min.js"></script>
<script src="nodeAssets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
</body>

</html>
