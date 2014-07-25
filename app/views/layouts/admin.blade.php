<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.adminhead')
  </head>

  <body>

      <div class="container">

        @include('admin.navbar')

        @yield('content')

      </div> 


       @include('admin.adminfooter') 

  </body>
</html>
