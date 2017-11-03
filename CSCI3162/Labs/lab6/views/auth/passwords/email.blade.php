@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="ui middle aligned center aligned grid">
    <div class="six wide column">
        <h2 class="ui black header">Reset Password</h2>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="ui large form" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="ui left aligned stacked segment">

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

                    <button type="submit" class="fluid ui black button">
                        Send Reset
                    </button>
                </div>
             </form>
    </div>
</div>
@endsection
