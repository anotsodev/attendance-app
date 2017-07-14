@extends('layouts.app')
@section('title', 'Students Attendance List')
@section('header')
	@parent
@endsection
@section('content')
<div class="col-md-12">
	<div class="page-header">
		<h1 id="navbar">Student Attendance List</h1>
		<h3 id="navbar">Event: {{ $eventname->name }}</h3>
	</div>
	<div class="col-md-12">
			<form class="form-horizontal" method="GET">
				{{ csrf_field() }}
				<input value="{{ app('request')->input('event_id') }}" hidden="" name="event_id">
				<fieldset>
					<div class="form-group">
						<div class="col-md-6"></div>
						<label for="class_code" class="col-md-2 control-label ">Select Class Code</label>
						<div class="col-md-4">
							<select id="class_code" class="form-control" name="class_code">
								@foreach ($allclasscodes as $classcode)
								<option value="{{ $classcode->id }}"> {{ $classcode->class_code_no }} </option>
								@endforeach
								<option value="ALL"> All </option>
							</select>
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