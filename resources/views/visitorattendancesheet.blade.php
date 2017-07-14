@extends('layouts.app')
@section('title', 'Visitor')
@section('header')
@parent
@endsection
@section('content')
<div class="col-md-12">
   <div class="row">
      <div class="col-md-12">
         <form class="form-horizontal" method="POST" action="/insertvisitorattendance">
            {{ csrf_field() }}
            <fieldset>
               <legend>Visitor Attendance Sheet</legend>
               <p>Event Name: {{ app('request')->input('event_name') }}</p>
               <input type="text" class="form-control" id="event_id" name="event_id" value="{{ app('request')->input('event_id') }}" hidden="">
               <div class="form-group">
                  <label for="date" class="col-md-2 control-label">Date Today</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}" readonly="">
                  </div>
               </div>
               <div class="form-group">
                  <label for="full_name" class="col-md-2 control-label">Full Name</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" required="" 
                     >
                  </div>
               </div>
            <div class="form-group">
               <div class="col-md-10 col-md-offset-2">
                  <button type="button" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
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