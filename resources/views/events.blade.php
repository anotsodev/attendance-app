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
		<div class="col-md-12">
			<table class="table table-striped table-hover bs-component">
				<thead>
					<tr>
						<th>Event Name</th>
						<th>School Year</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($events as $event)
					<tr>
						<td> {{ $event->name }} </td>
						<td> {{ $event->school_year }} </td>
						<td> Link Here </td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $events->links() }}
		</div>
	</div>
	<div class="row">
		<button type="button" class="btn btn-primary btn-raised btn-lg pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">Add New Event</button>
	</div>
</div>
@endsection