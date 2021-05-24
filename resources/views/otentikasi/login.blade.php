<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('sbadmin2/css/style.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>
                                    <font color="black">Welcome to</font><br>
                                    <p style="text-indent: 45px;">
                                        <img src="{{ asset('adminLte/img/LOGO I-CARE-1.png') }}" width="300px"
                                            height="150px">
                                    </p>
                                </h4>
                                <h6>
                                    <p align="center">iCare adalah sebuah dashboard monitoring yang bertujuan untuk
                                        memprediksi
                                        indikasi pelanggan dengan treatment sesuai dengan Masa Length of Stay dan
                                        Parameter Churn
                                    </p>

                                    <br><br>
                                    Contact person / admin : <br>
                                    Telegram : @rahmaoryza / @rizaldi31
                                </h6>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-0">LOGIN</h1>
                                        <marquee direction="left" class="text-danger mb-2">
                                            LOGIN ready with LDAP TELKOM!
                                        </marquee>

                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-block">
                                                <button class="close" type="button" data-dismiss="alert">x</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        @if ($message = Session::get('message'))
                                            <div class="alert alert-success alert-block">
                                                <button class="close" type="button" data-dismiss="alert">x</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{{ route('logins') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                id="username" name="username" value="{{ old('username') }}"
                                                placeholder="Enter Username">

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" placeholder="Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row col-12">
                                            <div class="row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <div class="captcha">
                                                        <span>{!! captcha_img() !!}</span>
                                                        {{-- <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                        &#x21bb;
                                                    </button> --}}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input id="captcha" type="text"
                                                        class="form-control @error('captcha') is-invalid @enderror"
                                                        placeholder="Enter Captcha" name="captcha">
                                                    @error('captcha')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-danger btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div>
                                        {{-- <a class="small" href="#">Forgot Password?</a> --}}
                                    </div>
                                    <div>
                                        {{-- Don't have an account? <a href="{{ route('register') }}">Create One</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

    {{-- <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: '{{ route('reloadCaptcha') }}',
    success: function (data) {
    $(".captcha span").html(data.captcha);
    }
    });
    });

    </script> --}}

</body>

</html>