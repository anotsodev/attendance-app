@extends('layouts.app')

@section('title', 'Welcome')

@section('header')
    @parent
@endsection

@section('content')
<div class="col-md-12">
   <div class="row">
      <div class="page-header">
         <h1 id="navbar">Current Event</h1>
      </div>
      <div class="bs-component">
         @foreach ($currentevent as $event)
         <div class="">
            <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">
               <div class="mdl-card__title"><h1 class="mdl-card__title-text">Event: {{ $event->name }}</h1></div>
               <div class="mdl-card__media"><img class="article-image" src="img/events.jpg" border="0" alt="About"></div>
               <div class="col-md-12">
                  <h3 class="">Description: </h3>
                  <p>{{ $event->event_description }}</p>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="mdl-card__actions mdl-card--border">
                        <a href="{{ route('studentattendancesheet',['event_id'=>$event->event_id, 'event_name'=>$event->name]) }}"><button class="btn btn-danger btn-lg pull-right">Attendance Sheet</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   <!-- <div class="well bs-component">
      <form class="form-horizontal">
         
      </form>
      <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
   </div> -->
   
</div>
@endsection