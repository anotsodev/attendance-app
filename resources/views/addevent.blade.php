@extends('layouts.app')
@section('title', 'Add Event')
@section('header')
@parent
@endsection
@section('content')
<div class="col-md-12">
   <div class="row">
      <div class="col-md-12">
         <form class="form-horizontal" method="POST" action="/insertevent">
            {{ csrf_field() }}
            <fieldset>
               <legend>New Event</legend>
                <div class="form-group">
                  <label for="event_name" class="col-md-2 control-label">Event Name</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Event Name" required="">
                  </div>
               </div>
               <div class="form-group">
                  <label for="textArea" class="col-md-2 control-label">Event Description</label>
                  <div class="col-md-10">
                     <textarea class="form-control" rows="3" id="textArea" name="event_description"></textarea>
                     <span class="help-block">Please enter the short description of the event.</span>
                  </div>
               </div>
                <div class="form-group">
                  <label for="school_year" class="col-md-2 control-label">School Year</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="school_year" name="school_year" value="{{ date('Y') }} - {{ date('Y')+1 }}" placeholder="School Year" readonly="" required="">
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