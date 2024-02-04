<!DOCTYPE html>
<html lang="en">

  @include('Admin.includes.head')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            @include('Admin.includes.profileQuickInfo')

            <br />

            @include('Admin.includes.sidebarMenu')

            @include('Admin.includes.footerButtons')
          </div>
        </div>

        @include('Admin.includes.topNavigation')

        @yield('content')

        @include('Admin.includes.footer')
      </div>
    </div>

    @include('Admin.includes.footerJS')

  </body>
</html>