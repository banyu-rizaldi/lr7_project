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

            <div class="col-xl-10 col-lg-12 col-md-12">

                <div class="card o-hidden border-1 my-5 px-2">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 bg-secondary">
                                <div class="mt-5 mb-5">
                                    <h6 class="text-white">
                                        <center>
                                            <div class="px-5">
                                                <p class="text-justify">
                                                    <b>&emsp;iCare</b>
                                                    adalah sebuah dashboard monitoring yang bertujuan untuk
                                                    memprediksi indikasi pelanggan dengan treatment dengan Masa Length of Stay
                                                    dan Parameter Churn
                                                </p>
                                            </div>
                                        </center>
                                    </h6>
                                </div>

                                <div class="text-center align-bottom">
                                    <img src="{{ asset('images/login.png') }}" width="420px" height="420px">
                                </div>

                            </div>
                            <div class="col-lg-6" style="background-color: white">
                                    <div class="text-center">

                                        <img src="{{ asset('adminLte/img/LOGO I-CARE-1.png') }}" width="250px" height="100px">

                                        <h1 class="h4 text-gray-900 mb-0 mt-2">LOGIN</h1>
                                        <marquee direction="left" class="text-danger mb-2">
                                            LOGIN ready with LDAP TELKOM!
                                        </marquee>

                                        
                                    </div>
                                    <form method="POST" action="{{ route('logins') }}">
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
                                      <div class="form-group row justify-content-center">
                                               
                                                    <div class="captcha">
                                                        <span>{!! captcha_img() !!}</span>
                                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                            &#x21bb;
                                                        </button>
                                                    </div>
                                                
                                                   
                                                
                                        </div>

                                        <div class="form-group">
                                            <input id="captcha" type="text"
                                                        class="form-control @error('captcha') is-invalid @enderror"
                                                        placeholder="Enter Captcha" name="captcha">
                                                    @error('captcha')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                        </div>


                                        <button type="submit" class="btn btn-danger btn-block">
                                            Login
                                        </button>
                                        <hr>

                                        <div class="text-right">
                                            <br><br>
                                            <p class="text-dark font-weight-bold">Contact person / admin : <br>
                                            Telegram : @rahmaoryza / @rizaldi31</p>
                                        </div>

                                    </form>
                                    
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

    {{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

    <script type="text/javascript">
        $('#reload').click(function(){
          $.ajax({
             type:'GET',
             url:'refreshcaptcha',
             success:function(data){
                $(".captcha span").html(data.captcha);
             }
          });
        });
    </script>

</body>

</html>
