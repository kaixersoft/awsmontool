<script>

  {{-- Facebook SDK --}}
  window.fbAsyncInit = function() {
    FB.init({
    appId  : "{{Config::get('facebook.AppId')}}",
    status : true,
    cookie : true,
    xfbml  : true,
    oauth  : true 
    });
    FB.Canvas.setAutoGrow();        
  };


  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  





</script>