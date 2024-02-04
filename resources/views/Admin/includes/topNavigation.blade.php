<?php
use Carbon\Carbon;
?>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('adminAssets/images/img.jpg')}}" alt="">{{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="javascript:;"> Profile</a>
                <a class="dropdown-item"  href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                </a>
            <a class="dropdown-item"  href="javascript:;">Help</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out pull-right"></i> Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
            </li>

            <li role="presentation" class="nav-item dropdown open">
            <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-green">{{$unreadMessages}}</span>
            </a>
            <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
            @forelse($showUnreadMessages as $showUnreadMessage)
                <li class="nav-item">
                <a href="{{ route('showContact', $showUnreadMessage->id) }}" class="dropdown-item">
                    <span class="image"><img src="{{asset('adminAssets/images/img.jpg')}}" alt="Profile Image" /></span>
                    <span>
                    <span>{{ $showUnreadMessage->firstName }} {{ $showUnreadMessage->lastName }}</span>
                    <span class="time">
                        @php 
                            $timePassed = $showUnreadMessage->created_at->diffForHumans();
                            echo $timePassed
                        @endphp
                    </span>
                    </span>
                    <span class="message">
                    {{ str_limit($showUnreadMessage->message, $limit = 100) }} 
                    </span>
                </a>
                </li>
            @empty
                <p class="dropdown-item">No messages</p>
            @endforelse
                <li class="nav-item"> 
                <div class="text-center">
                    <a href="{{ route('message') }}" class="dropdown-item">
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                </li>
            </ul>
            </li>
        </ul>
        </nav>
    </div>
    </div>
<!-- /top navigation -->