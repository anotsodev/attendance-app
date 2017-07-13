@extends('layouts.app')
@section('title', 'Students Attendance List')
@section('header')
	@parent
@endsection
@section('content')
<div class="col-md-12">
	<div class="page-header">
		<h1 id="navbar">Student Attendance List</h1>
		<h4 id="navbar">{{ $eventname->name }}</h4>
	</div>
	<div class="col-md-12">
			<table class="table table-striped table-hover bs-component">
				<thead>
					<tr>
						<th>Class Code</th>
						<th>Student ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Course</th>
						<th>Year</th>
						<th>Date Attended</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($students as $student)
					<tr>
						<td> {{ $student->class_code_no }} </td>
						<td> {{ $student->student_id }} </td>
						<td> {{ $student->first_name }} </td>
						<td> {{ $student->last_name }} </td>
						<td> {{ $student->course }} </td>
						<td> {{ $student->year }} </td>
						<td> {{ $student->date_attended }} </td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $students->links() }}
		</div>
</div>

@endsection