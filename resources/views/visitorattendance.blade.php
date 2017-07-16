@extends('layouts.app')
@section('title', 'Visitors Attendance List')
@section('header')
	@parent
@endsection
@section('content')
<div class="col-md-12">
	<div class="page-header no-print">
		<h1 id="navbar">Visitors Attendance List</h1>
		<h3 id="navbar">{{ $eventname->name }}</h3>
	</div>
	<div class="col-md-12">
		<table class="table table-striped table-hover bs-component">
			<thead>
				<tr>
					<th>Full Name</th>
					<th>Date Attended</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($visitors as $visitor)
				<tr>
					<td> {{ $visitor->full_name }} </td>
					<td> {{ $visitor->date_attended }} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<button class="btn btn-primary btn-raied pull-right no-print" onclick="window.print()">Print Attendance</button>
		{{ $visitors->links() }}
	</div>
</div>

@endsection