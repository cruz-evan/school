@extends('layouts.app')

@section('content')
<div class="ui middle aligned center aligned grid">
    <div class="six wide column">
        <h2 class="ui black header">Change Password</h2>
            <div class="ui left aligned stacked segment">
                <form class="ui large form" action="" method="post" role="form" class="form-horizontal">
                    {{csrf_field()}}
 
                        <div class="field{{ $errors->has('old') ? ' has-error' : '' }}">
                            <label for="password">Current Password</label>
 
                            <div>
                                <input id="password" type="password" name="old">
 
                                @if ($errors->has('old'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                            <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password"">New Password</label>
 
                                <div>
                                    <input id="password" type="password" name="password">
 
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
 
                            <div class="field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm">Confirm New Password</label>
 
                                <div>
                                    <input id="password-confirm" type="password" name="password_confirmation">
 
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
 
                        <button type="submit" class="fluid ui black button">Submit</button>
                        @if (Session::has('success'))
                            <div class="alert alert-success">{!! Session::get('success') !!}</div>
                        @endif
                        @if (Session::has('failure'))
                            <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                        @endif
                </form>
            </div>
 
    </div>
</div>
@endsection
