<div class="navbar nav_title" style="border: 0;">
    <a href="{{ route('index') }}" class="site_title"><i class="fa fa-car"></i></i> <span>Rent Car Admin</span></a>
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
    <img src="{{asset('adminAssets/images/img.jpg')}}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
    <span>Welcome,</span>
    <h2>{{ Auth::user()->name }}</h2>
    </div>
</div>
<!-- /menu profile quick info -->