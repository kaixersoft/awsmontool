<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<meta name="description" content="">
<meta name="viewport" content="width=810">
<link rel="stylesheet" href="{{Config::get('facebook.BASE_URL')}}assets/css/jquery.qtip.css">
<link rel="stylesheet" href="{{Config::get('facebook.BASE_URL')}}assets/js/vendor/colorbox/colorbox.css">
<link rel="stylesheet" href="{{Config::get('facebook.BASE_URL')}}assets/css/normalize.min.css">        
<link rel="stylesheet" href="{{Config::get('facebook.BASE_URL')}}assets/css/main.css">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>        
<script src="{{Config::get('facebook.BASE_URL')}}assets/js/vendor/head.min.js"></script>
<script src="{{Config::get('facebook.BASE_URL')}}assets/js/vendor/modernizr-2.6.2.min.js"></script>

{{-- Google Analytics --}}

<script type="text/javascript">  

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', "{{Config::get('facebook.GA_TRACKING_ID')}}", 'flok.co');
  ga('send', 'pageview');

 </script>
 