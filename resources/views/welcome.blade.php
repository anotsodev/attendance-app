@extends('layouts.app')

@section('title', 'Welcome')

@section('header')
    @parent
@endsection

@section('content')
   <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp welcome-card portfolio-card">
        <div class="mdl-card__title">
          <h2 class="mdl-card__title-text">Welcome</h2>
        </div>
        <div class="mdl-card__supporting-text">
          Demo of Material Design Portfolio Template by TemplateFlip. Click on &quot;Download&quot; button below to download the template.
        </div>
        <div class="mdl-card__actions mdl-card--border">
          <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href=" https://templateflip.com/templates/material-portfolio/" target="_blank">
            Download
          </a>
        </div>
    </div>
@endsection