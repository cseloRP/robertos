@extends('main')

@section('title', '| Login')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Login</h1>
            <hr>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">E-Mail Address</label>


                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>


                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                </div>

                <div class="form-group">
                    <div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LeNoCAUAAAAAHrnPaS-n2VseYc3JA1eDkeW_kD-"></div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
