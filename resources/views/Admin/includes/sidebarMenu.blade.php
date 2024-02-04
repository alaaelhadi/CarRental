<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('user') }}">Users List</a></li>
                    <li><a href="{{ route('addUser') }}">Add User</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('category') }}">Categories List</a></li>
                    <li><a href="{{ route('addCategory') }}">Add Category</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> Cars <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('car') }}">Cars List</a></li>
                    <li><a href="{{ route('addCar') }}">Add Car</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> Testimonials <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('testimonial') }}">Testimonials List</a></li>
                    <li><a href="{{ route('addTestimonial') }}">Add Testimonials</a></li>               
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> Messages <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('message') }}">Messages</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<!-- /sidebar menu -->