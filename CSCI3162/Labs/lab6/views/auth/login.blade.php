@extends('layouts.app')

@section('content')
<div class="ui middle aligned center aligned grid">
    <div class="six wide column">
        <h2 class="ui black header">Login</h2>
        <form class="ui large form" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="ui left aligned stacked segment">

                <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Username</label>

                    <div>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>

                    <div>
                        <input id="password" type="password"  name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="fluid ui black button">
                    Login
                </button>

                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                    Forgot Your Password?
                </a>

            </div>
        </form>
    </div>
</div>
@endsection
