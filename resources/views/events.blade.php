@extends('layouts.app')
@section('title', 'Event List')
@section('header')
@parent
@endsection
@section('content')
<div class="col-md-12">
	@if(session()->has('status'))
	<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<h4>Success</h4>
		<p>
			{{ session()->get('status') }}
		</p>
	</div>
	@endif
	<div class="page-header">
		<h1 id="navbar">Events</h1>
	</div>
	<div class="bs-component">
		<div class="row">
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
		</div>
		<div class="row">
			<div class="bs-component">
				@foreach ($events as $event)
				<div class="">
					<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">
						<div class="col-md-12">
							<h3 class="">Event: {{ $event->name }} <span class="pull-right"> School Year: {{ $event->school_year }}</span></h3>
						</div>
						<div class="mdl-card__media"><img class="article-image" src="img/events.jpg" border="0" alt="About"></div>
						<div class="col-md-12">
							<h3 class="">Description: </h3>
							<p>{{ $event->event_description }}</p>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="mdl-card__actions mdl-card--border">
								<a href="{{ route('studentattendancesheet',['event_id'=>$event->event_id, 'event_name'=>$event->name]) }}"><button class="btn btn-primary pull-right">Attendance Sheet</button></a>
								<div class="btn-group pull-right">
									<a href="" data-target="#" class="btn btn-primary dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
										Attendance List
										<span class="caret"></span>
										<div class="ripple-container"></div>
									</a>
									<ul class="dropdown-menu">
										<li><a href="{{ route('studentattendance',['event_id'=>$event->event_id]) }}">View Students Attendance List</a></li>
										<li><a href="{{ route('visitorattendance',['event_id'=>$event->event_id]) }}">View Visitors Attendance List</a></li>
									</ul>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="row">
		<a href="{{ route('addevent') }}"><button type="button" class="btn btn-primary btn-raised btn-lg pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">Add New Event</button></a>
	</div>
	{{ $events->links() }}
</div>
@endsection