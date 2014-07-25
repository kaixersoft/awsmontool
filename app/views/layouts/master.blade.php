<!DOCTYPE html>
<!-- saved from url=(0023)https://apps.flok.co/ -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	@include('includes.head')  
</head>
<body>
	<div id="fb-root"></div>
  	<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser, therefore some items might not show correctly. <br/>Please <a href="https://browsehappy.com/">upgrade your browser</a> or <a href="https://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p><![endif]-->
	@yield('content')
	@yield('contentjs') 
	@include('includes.footer')
</body>
</html>
