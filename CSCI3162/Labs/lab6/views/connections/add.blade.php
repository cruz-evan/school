@extends('layouts.app')

@section('content')
  <div class="ui grid">
    <div class="one column"></div>
    <div class="fourteen wide column">
      <h2>Add Connection</h2>
      @if (count($errors) > 0)

        <div class="ui error message">
          <div class="header">Invalid Connection</div>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form class="ui form" method="post">
        {{ csrf_field() }}
        <div class="field">
          <label>Name</label>
          <input name="name" placeholder="Connection Name..." value="{{ old('name') }}" />
        </div>
        <div class="two fields">
          <div class="field">
            <label>Hostname</label>
            <input name="hostname" placeholder="Hostname..." value="{{ old('hostname') }}" />
          </div>
          <div class="field">
            <label>Port</label>
            <input name="port" placeholder="Port..." type="number" value="{{ old('port') }}" />
          </div>
        </div>
        <div class="field">
          <label>Database/Schema</label>
          <input name="database" placeholder="Database..." value="{{ old('database') }}" />
        </div>
        <div class="field">
          <script>
          $(document).ready(function() {
            $('.ui.dropdown').dropdown('set selected', '{{ old("driver")}}');
          });
          </script>
          <label>Driver</label>
          <select class="ui dropdown" name="driver">
            <option value="mysql">MySQL</option>
            <option value="postgresql">PostgreSQL</option>
            <option value="sqlite">SQLite</option>
          </select>
        </div>
        <div class="two fields">
          <div class="field">
            <label>Username</label>
            <input name="username" placeholder="Username" value="{{ old('username') }}" />
          </div>
          <div class="field">
            <label>Password</label>
            <input name="password" placeholder="Password" type="password" value="{{ old('password') }}" />
          </div>
        </div>
        <input type="submit" class="ui right green button" value="Add Connection" />
      </form>
    </div>
  </div>

@endsection
