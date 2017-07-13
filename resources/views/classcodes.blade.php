@extends('layouts.app')
@section('title', 'Class Code List')
@section('header')
@parent
@endsection
@section('content')
<div class="col-md-12">
	<div class="page-header">
		<h1 id="navbar">Class Codes</h1>
	</div>
	<form class="form-horizontal" method="GET">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<div class="col-md-6"></div>
				<label for="school_year" class="col-md-2 control-label ">Select School Year</label>
				<div class="col-md-4">
					<select id="school_year" class="form-control" name="school_year">
						@foreach ($classcodes as $classcode)
							<option value="{{ $classcode->school_year }}"> {{ $classcode->school_year }} </option>
						@endforeach
						<option value="ALL"> All </option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary pull-right">Filter</button>
			</div>
		</fieldset>
	</form>
	<div class="row">
		<div class="bs-component">
			@foreach ($classcodes as $classcode)
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Class Code: {{ $classcode->class_code_no }} - School Year: {{ $classcode->school_year }}</div>
					<div class="panel-body">
						<b>Event: </b> {{ $classcode->name }}
						<br>
						<b>Instructor:</b> {{ $classcode->instructor_full_name }}
					</div>
					<a href="{{ route('studentattendance', ['classcode'=> $classcode->class_code_no, 'classcode_id'=>$classcode->id,'school_year'=>$classcode->school_year,'event'=>$classcode->event_id]) }}"><button class="btn btn-primary">View Attendance Record</button></a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	{{ $classcodes->links() }}
	<div class="row">
		<button type="button" class="btn btn-primary btn-raised btn-lg pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">Add New Classcode</button>
	</div>
	
</div>

@endsection