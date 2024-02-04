<!doctype html>
<html lang="en">

  @section('title')
  CarRental
  @endsection
  
  @include('User.includes.head')

  <body>

    <div class="site-wrap" id="home-section">

      @include('User.includes.navbar')

      @include('User.includes.carousel')
  
      @include('User.includes.steps')
      
      @include('User.includes.promo')

      @include('User.includes.carListing')

      @include('User.includes.features')

      @include('User.includes.testimonials')

      @include('User.includes.rentAcar')
      
      @include('User.includes.footer')

    </div>

    @include('User.includes.footerJS')

  </body>

</html>