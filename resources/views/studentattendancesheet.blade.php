@extends('layouts.app')
@section('title', 'Student')
@section('header')
@parent
@endsection
@section('content')
<div class="col-md-12">
   <div class="row">
      <h3 class="text-danger">Visitors Attendance Here
      <a href="{{ route('visitorattendancesheet',['event_id'=>app('request')->input('event_id'),'event_name'=>app('request')->input('event_name')]) }}"><button class="btn btn-primary">Visitor Attendance</button></a>
      </h3>
   </div>
   <div class="row">
      <div class="col-md-12">
         <form class="form-horizontal" method="POST" action="/insertstudentattendance">
            {{ csrf_field() }}
            <fieldset>
               <legend>Student Attendance Sheet</legend>
               <p>Event Name: {{ app('request')->input('event_name') }}</p>
               <div class="form-group">
                  <label for="date" class="col-md-2 control-label">Date Today</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}" readonly="">
                  </div>
               </div>
               <input type="text" class="form-control" id="event_id" name="event_id" value="{{ app('request')->input('event_id') }}" hidden="">
               <div class="form-group">
                  <label for="classcode" class="col-md-2 control-label">Class Code</label>
                  <div class="col-md-10">
                     <select id="classcode" class="form-control" name="class_code" required="">
                        <option value="">Select Class Code</option>
                        @foreach($classcodes as $classcode)
                        <option value="{{ $classcode->id }}">{{ $classcode->class_code_no }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="studentid" class="col-md-2 control-label">Student ID</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="studentid" name="student_id" placeholder="Student ID" required="" 
                     >
                  </div>
               </div>
               <div class="form-group">
                  <label for="first_name" class="col-md-2 control-label">First Name</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required="" 
                     >
                  </div>
               </div>
               <div class="form-group">
                  <label for="last_name" class="col-md-2 control-label">Last Name</label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required="" 
                     >
                  </div>
               </div>
               <div class="form-group">
                  <label for="course" class="col-md-2 control-label">Course</label>
                  <div class="col-md-5">
                     <input type="text" class="form-control" id="course" name="course" placeholder="Course" required="" 
                     >
                  </div>
               </div>
               <div class="form-group">
                  <label for="year" class="col-md-2 control-label">Year</label>
                  <div class="col-md-5">
                     <input type="number" class="form-control" id="year" name="year" placeholder="Year" required=""
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