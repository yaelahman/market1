<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>License App</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/template/assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="/template/assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/template/assets/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="background-color: #f2f7f8">
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center mt-2">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header topbar" style="color: white">
                        <h3 class="mt-2">{{ __('Register') }}</h3>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" class="form-horizontal form-material mx-2" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control ps-0 form-control-line @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control ps-0 form-control-line @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Password</label>
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control ps-0 form-control-line @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Password Confirmation</label>
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control ps-0 form-control-line " name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/template/assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/template/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/template/assets/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="/template/assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/template/assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/template/assets/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src="/template/assets/plugins/flot/jquery.flot.js"></script>
    <script src="/template/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="/template/assets/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
