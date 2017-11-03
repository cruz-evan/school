@extends('app')

@section('content')
	<h1>Edit: {{$task->title}}</h1>
	<div class="panel panel-default">
	@include ('varbuttons')
	{!! Form::model($task, ['method'=>'PATCH', 'action' => ['TasksController@update', $task->id]]) !!}
		@include ('tasks.BaseForm')
		<div class="form-group">
			{!! Form::submit('Edit Task', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	@include ('errors.errors')
	</div>
@stop