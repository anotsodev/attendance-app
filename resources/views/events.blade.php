@extends('layouts.app')
@section('title', 'Event List')
@section('header')
@parent
@endsection
@section('content')
<div class="col-md-12">
	<div class="page-header">
		<h1 id="navbar">Events</h1>
	</div>
	<div class="bs-component">
		<div class="col-md-12">
			<form class="form-horizontal" method="GET">
				{{ csrf_field() }}
				<fieldset>
					<div class="form-group">
						<div class="col-md-6"></div>
						<label for="school_year" class="col-md-2 control-label ">Select School Year</label>
						<div class="col-md-4">
							<select id="school_year" class="form-control" name="school_year">
								@foreach ($allevents as $event)
									<option value="{{$event->school_year}}"> {{ $event->school_year }} </option>
								@endforeach
								<option value="ALL"> All </option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary pull-right">Filter</button>
					</div>

				</fieldset>
			</form>
		</div>
		<div class="row">
		<div class="bs-component">
			@foreach ($events as $event)
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading"><b>Event:</b> {{ $event->name }} <span class="pull-right"><b>School Year:</b> {{ $event->school_year }}</span></div>
					<div class="panel-body">
						<p>{{ $event->event_description }}</p>
					</div>
					<div class="col-md-offset-7">
					<div class="btn-group">
						<a href="" data-target="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							Attendance
							<span class="caret"></span>
							<div class="ripple-container"></div>
						</a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('studentattendancesheet') }}">Add Attendence</a></li>
							<li><a href="{{ route('studentattendance',['event_id'=>$event->event_id]) }}">View Attendance Record</a></li>
						</ul>
					</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	</div>
	<div class="row">
		<button type="button" class="btn btn-primary btn-raised btn-lg pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">Add New Event</button>
	</div>
</div>
@endsection