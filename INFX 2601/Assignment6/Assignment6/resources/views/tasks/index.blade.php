@extends('app')

@section('content')
	<h1>Tasks page</h1>
	@include ('varbuttons')
	<div class="panel panel-default">
	<table class='table'>
	<tr><th>Title</th><th>Description</th><th>Type</th><th>Edit</th><th>Delete</th></tr>
	@foreach($Task as $tasks)
		<tr style='border-bottom: 1px solid #ececec;'>
			<td><a href="/tasks/{{ $tasks->id }}">{{$tasks->title}}</a></td>
			<td>{{$tasks->description}}</td>
			<td>{{$tasks->typet}}</td>
			<td><a href="/tasks/{{$tasks->id}}/edit" class="btn btn-default">Edit</a></td>
			<td>
				{!! Form::open(array('route' => array('tasks.destroy', $tasks->id), 'method' => 'delete')) !!}
				<button type="submit" class="btn btn-danger">Delete</button>
				{!! Form::close() !!}
			</td>
		</tr>
	@endforeach
	</table>
	<div class="panel panel-default">
@stop
