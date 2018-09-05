<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }} Admin Login</title>

</head>

<body class="gray-bg">
<h1 class="logo-name text-center">{{ config('app.name', 'Laravel') }}</h1>
<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>


        </div>
        <h3>Welcome to {{ config('app.name', 'Laravel') }}</h3>

        <p>Login in. To see it in action.</p>
        <form class="m-t" role="form" action="{{ route('admin.login.submit') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" placeholder="Email" required="" value="{{old('email')}}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                @if ($errors->has('password'))
                    <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="{{route("admin.password.request")}}">
                <small>Forgot password?</small>
            </a>
            <div class="form-group">

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

            </div>
        </form>
        <p class="m-t">
            <small>{{ config('app.name', 'Laravel') }} &copy; {{date("Y")}}</small>
        </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>

</html>
