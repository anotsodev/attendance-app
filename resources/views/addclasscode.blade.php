@extends('layouts.app')
@section('title', 'Add Class Code')
@section('header')
@parent
@endsection
@section('content')
<div class="col-md-12">
   <div class="row">
      <div class="col-md-12">
         <form class="form-horizontal" method="POST" action="/insertclasscode">
            {{ csrf_field() }}
            <fieldset>
               <legend>New Class Code</legend>
                <div class="form-group">
                  <label for="class_code" class="col-md-2 control-label">Class Code</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="class_code" name="class_code" value="{{ date('Y') }} - {{ date('Y')+1 }}" placeholder="Class Code" readonly="" required="">
                  </div>
               </div>
               <div class="form-group">
                  <label for="instructor_full_name" class="col-md-2 control-label">Instructor Full Name</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="instructor_full_name" name="instructor_full_name" placeholder="Instructor Full Name" required="">
                  </div>
               </div>
                <div class="form-group">
                  <label for="school_year" class="col-md-2 control-label">School Year</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="school_year" name="school_year" placeholder="School Year" required="" 
                     >
                  </div>
               </div>
            <div class="form-group">
               <div class="col-md-10 col-md-offset-2">
                  <button type="button" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save</button>
               </div>
            </div>
         </fieldset>
      </form>
   </div>
</div>
<!-- <div class="well bs-component">
   <form class="form-horizontal">
      
   </form>
   <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
</div> -->

</div>
@endsection