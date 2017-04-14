@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-container">
            {{--<img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt=""/>--}}
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <span id="reauth-email" class="reauth-email"></span>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                           required autofocus name="email" value="{{ old('email') }}">
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password"
                           name="password"
                           required>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"
                               name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a class="btn btn-link forgot-password" href="{{ url('/password/reset') }}">
                Forgot Your Password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
@endsection
