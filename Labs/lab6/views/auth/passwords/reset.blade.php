@extends('layouts.app')

@section('content')
<div class="ui middle aligned center aligned grid">
    <div class="six wide column">
        <h2 class="ui black header">Reset Password</h2>

            <form class="ui large form" role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}
                <div class="ui left aligned stacked segment">

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-mail Address</label>

                        <div>
                            <input id="email" type="email" name="email" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
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

                    <div class="field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm">Confirm Password</label>

                        <div>
                            <input id="password-confirm" type="password" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="fluid ui black button">
                        Reset
                    </button>
                </div>
            </form>
    </div>
</div>
@endsection
