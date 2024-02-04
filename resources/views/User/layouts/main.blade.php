<!doctype html>
<html lang="en">

  @include('User.includes.head')

  <body>

    <div class="site-wrap" id="home-section">

      @include('User.includes.navbar')

      @yield('content')

      @section('rentAcar')
      @include('User.includes.rentAcar')
      @show
      
      @include('User.includes.footer')

    </div>

    @include('User.includes.footerJS')

  </body>

</html>