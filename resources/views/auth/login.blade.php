<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('/Login_V2/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Login_V2/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/Login_V2/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/Login_V2/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Login_V2/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Login_V2/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Login_V2/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Login_V2/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Login_V2/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Login_V2/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Login_V2/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                @csrf
                    <span class="login100-form-title p-b-26">
                        Login
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-memory"></i>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input-label for="email" :value="__('Email')" />
                        <input class="input100" type="text" name="email" requiredautofocus autocomplete="username"
                            :value="old('email')">
                        <span class="focus-input100" data-placeholder="Email"></span>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input-label for="password" :value="__('Password')" />
                        <input class="input100" type="password" name="password" id="inputPassword" required>
                        <span class="focus-input100" data-placeholder="Password"></span>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Don’t have an account?
                        </span>

                        <a class="txt2" href="{{ route('register') }}">
                            Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    {{-- show password --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('inputPassword');
            const showPassButtons = document.querySelectorAll('.btn-show-pass');

            showPassButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                    } else {
                        passwordInput.type = 'password';
                    }
                });
            });
        });
    </script>

    <!--===============================================================================================-->
    <script src="{{ asset('/Login_V2/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/Login_V2/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/Login_V2/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('/Login_V2/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/Login_V2/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/Login_V2/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('/Login_V2/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/Login_V2/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/Login_V2/js/main.js') }}"></script>

</body>

</html>
