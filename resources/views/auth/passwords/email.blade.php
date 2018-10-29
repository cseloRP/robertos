@extends('main')

@section('title', '| Reset Password')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Reset Password</h1>
            <hr>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                </div>
            </form>
        </div>
    </div>
@endsection