@extends('layouts.app')
@section('title', 'Students Attendance List')
@section('header')
	@parent
@endsection
@section('content')
<div class="col-md-12">
	<div class="page-header no-print">
		<h1 id="navbar">Student Attendance List</h1>
		<h3 id="navbar">Event: {{ $eventname->name }}</h3>
	</div>
	<div class="col-md-12">
			<form class="form-horizontal no-print" method="GET">
				{{ csrf_field() }}
				<input value="{{ app('request')->input('event_id') }}" hidden="" name="event_id">
				<fieldset>
					<div class="form-group">
						<div class="col-md-6"></div>
						<label for="class_code" class="col-md-2 control-label ">Search Class Code</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="class_code" placeholder="Search Class Code">
						</div>
						<button type="submit" class="btn btn-primary pull-right">Filter</button>
					</div>
				</fieldset>
			</form>
			<table class="table table-striped table-hover bs-component">
				<thead>
					<tr>
						<th>Class Code</th>
						<th>Student ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Date Attended</th>
						<th>Ticket Number</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($students as $student)
					<tr>
						<td> {{ $student->class_code }} </td>
						<td> {{ $student->student_id }} </td>
						<td> {{ $student->first_name }} </td>
						<td> {{ $student->last_name }} </td>
						<td> {{ $student->date_attended }} </td>
						<td> {{ $student->ticket_no }} </td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<button class="btn btn-primary btn-raied pull-right no-print" onclick="window.print()">Print Attendance</button>
			{{ $students->links() }}
		</div>
</div>

@endsection