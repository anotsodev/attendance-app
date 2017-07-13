@extends('layouts.app')
@section('title', 'Student')
@section('header')
@parent
@endsection
@section('content')
<div class="col-md-12">
   <div class="row">
      <h3>Visitors Attendance Here
      <a href="{{ route('visitorattendancesheet') }}"><button class="btn btn-primary">Visitor Attendance</button></a>
      </h3>
   </div>
   <div class="row">
      <div class="col-md-12">
         <form class="form-horizontal">
            <fieldset>
               <legend>Attendance Sheet</legend>
               <div class="form-group">
                  <label for="inputEmail" class="col-md-2 control-label">Email</label>
                  <div class="col-md-10">
                     <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
               </div>

            <div class="form-group">
               <label for="select111" class="col-md-2 control-label">Select</label>
               <div class="col-md-10">
                  <select id="select111" class="form-control">
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                     <option>4</option>
                     <option>5</option>
                  </select>
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