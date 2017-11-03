@extends('app')

@section('content')
	<h1>{{$task->title}}</h1>
	@include ('varbuttons')
	<div class="panel panel-default">
		<h5><b>Title</b></h5>
		{{$task->title}}
		<h5><b>Description</b></h5>
		{{$task->description}}
		<h5><b>Type</b></h5>
		{{$task->typet}}
	</div>
@stop