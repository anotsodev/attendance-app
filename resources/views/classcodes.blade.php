@extends('layouts.app')
@section('title', 'Class Code List')
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
		<h1 id="navbar">Class Codes</h1>
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
									@foreach ($allclasscodes as $classcode)
									<option value="{{ $classcode->school_year }}"> {{ $classcode->school_year }} </option>
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
				@foreach ($classcodes as $classcode)
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading"><b>Class Code:</b> {{ $classcode->class_code_no }} <span class="pull-right"><b>School Year:</b> {{ $classcode->school_year }}</span></div>
						<div class="panel-body">
							<b>Instructor:</b> {{ $classcode->instructor_full_name }}
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="row">
		<a href="{{ route('addclasscode') }}"><button type="button" class="btn btn-primary btn-raised btn-lg pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">Add New Classcode</button></a>
	</div>
	{{ $classcodes->links() }}
</div>

@endsection