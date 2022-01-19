<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="notification-list">
            <a href="javascript:void(0);">
                <span class="nav-link waves-effect" id="google_translate_element"></span>
            </a>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="javascript:void(0);"
                role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        Notification
                    </h5>
                </div>

                <div class="slimscroll noti-scroll">
                    <p class="text-center text-muted pt-5 pb-5 notify-item">No Notification Found..</p>
                </div>
            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown"
                href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                    title="{{ Auth::user()->name }}" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    {{ Auth::user()->name }}
                    <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        Welcome !
                    </h5>
                </div>
                <!-- item-->
                <a href="{{ route('admin.user.profile') }}" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Profile</span>
                </a>
                <!-- item-->
                <a href="{{ route('admin.user.profile.settings') }}" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <x-logout class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </x-logout>
            </div>
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                <i class="fe-settings noti-icon"></i>
            </a>
        </li>


    </ul>

    <!-- LOGO -->
    <div class="logo-box bg-white">
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
                <x-logo type="light" />
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">X</span> -->
                <x-logo type="sm" />
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </li>
    </ul>
</div>
<!-- end Topbar -->
