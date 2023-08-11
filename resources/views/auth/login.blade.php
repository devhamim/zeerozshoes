
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from revel-html.codebasket.xyz/dashboard-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Aug 2023 05:27:42 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Revel eCommerce Admin</title>
    
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/vendor/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/vendor/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/css/style.css">
    <link rel="stylesheet" id="primaryColor" href="{{ asset('backend') }}/dashboad/assets/css/orange-color.css">
    <link rel="stylesheet" id="rtlStyle" href="#">
</head>
<body class="light-theme">

    <!-- main content start -->
    <div class="main-content login-panel">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="{{ asset('backend') }}/dashboad/assets/images/logo-black.png" alt="Logo">
                </div>
                <a href="{{ url('/') }}"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h3 class="panel-title">Login</h3>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-30">
                        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                        <input id="password" type="password" class="form-control rounded-end @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        <a role="button" class="password-show"><i class="fa-duotone fa-eye"></i></a>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mb-30">
                        <div class="form-check">
                            {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-white" for="loginCheckbox">
                                Remember Me
                            </label> --}}
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-white fs-14">Forgot Password?</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary w-100 login-btn">Sign in</button>
                    
                </form>
                
                
            </div>
        </div>

        <!-- footer start -->
        <div class="footer">
            <p>Copyright© <script>document.write(new Date().getFullYear())</script> All Rights Reserved By <span class="text-primary">Revel</span></p>
        </div>
        <!-- footer end -->
    </div>
    <!-- main content end -->
    
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/js/main.js"></script>
</body>

<!-- Mirrored from revel-html.codebasket.xyz/dashboard-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Aug 2023 05:27:42 GMT -->
</html>