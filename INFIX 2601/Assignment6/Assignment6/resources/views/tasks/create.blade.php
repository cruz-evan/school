@extends('app')

@section('content')
	<h1>Create New Task</h1>
	@include ('varbuttons')
	<div class="panel panel-default">
	{!! Form::open(['url' => 'tasks']) !!}
		@include ('tasks.BaseForm')
		<div class="form-group">
			{!! Form::submit('Add Task', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	@include ('errors.errors');
	</div>
@stop