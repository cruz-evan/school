@extends('layouts.app')

@section('content')
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="fourteen wide column">
		<h2 class="ui dividing left aligned header">Database Connections</h2>
		<div class="field">
			<a href="{{ url('connections/add') }}">
				<button class="ui green button">Add Connection</button>
			</a>
		</div>
	</div>
	<div class="one wide column"></div>
	<div class="one wide column"></div>
	<div class="fourteen wide center aligned column">
		<div class="ui vertical stripe segment">
			<div class="ui hidden divider"></div>
			<div>
				<table class="ui striped table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Host</th>
							<th>Database</th>
							<th>Driver</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($connections as $conn)
							<tr>
								<td>{{ $conn->name }}</td>
								<td>{{ $conn->hostname }}</td>
								<td>{{ $conn->database }}</td>
								<td>{{ $conn->driver }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
