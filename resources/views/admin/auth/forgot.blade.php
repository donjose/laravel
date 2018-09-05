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

    <title>Forgot Password</title>

</head>

<body class="gray-bg">

<div class="passwordBox animated fadeInDown">
    <div class="row">

        <div class="col-md-12">
            <div class="ibox-content">

                <h2 class="font-bold">Forgot password</h2>

                <p>
                    Enter your email address and password reset link will be emailed to you.
                </p>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row">

                    <div class="col-lg-12">
                        <form class="m-t" role="form" action="{{ route('admin.password.email') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" name = "email" placeholder="Email address" required="" value = "{{old('email')}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary block full-width m-b">Send Password Reset Link</button>

                        </form>
                        <a href="{{route("admin.login")}}">
                            <small>I remember the password!</small>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <strong>Copyright</strong>  <a href = "{{ config('app.url') }}">{{ str_replace_first("http://","",config('app.url')) }}</a>
        </div>
        <div class="col-md-6 text-right">
            <small>© {{date("Y")}}</small>
        </div>
    </div>
</div>



<!-- Mainly scripts -->
<script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>

</html>
