<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SLU NSTP - @yield('title')</title>

    <meta name="description" content="Demo of Material design portfolio template by TemplateFlip.com."/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;amp;lang=en" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  </head>
  <body id="top">
  	@section('header')
	    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header"><a href="contact.html" id="contact-button" class="mdl-button mdl-button--fab mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast mdl-shadow--4dp"><i class="material-icons">mail</i></a>
	      <header class="mdl-layout__header mdl-layout__header--waterfall site-header">
	        <div class="mdl-layout__header-row site-logo-row"><span class="mdl-layout__title">
	            <div class="site-logo"></div><span class="site-description">Saint Louis University - NSTP - Attendance System</span></span></div>
	        <div class="mdl-layout__header-row site-navigation-row mdl-layout--large-screen-only">
	          <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font"><a class="mdl-navigation__link" href="index.html">Home</a><a class="mdl-navigation__link" href="portfolio.html">Portfolio</a><a class="mdl-navigation__link" href="about.html">About</a><a class="mdl-navigation__link" href="contact.html">Contact</a>
	          </nav>
	        </div>
	      </header>
     @show
      <div class="mdl-layout__drawer mdl-layout--small-screen-only">
        
      </div>
      <main class="mdl-layout__content">
        <div class="site-content">
        	<div class="mdl-grid site-max-width">
				@yield('content')  
			</div>
        </div>
        <footer class="mdl-mini-footer">
          <div class="footer-container">
            <div class="mdl-logo">&copy; Saint Louis University</div>
          </div>
        </footer>
      </main>
      <script src="https://code.getmdl.io/1.3.0/material.min.js" defer></script>
    </div>
  </body>
</html>