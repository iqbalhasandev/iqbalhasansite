<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">{{ auth()->user()->name }}</h5>
                    <span class="font-size-13 text-white-50">{{ get_user_role()->name}}</span>
                </div>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <x-admin-nav-link title="Dashboard" />
                <x-admin-nav-link href="{{ route('admin.dashboard') }}">
                    <i class="dripicons-home"></i>
                    <span> Dashboard </span>
                </x-admin-nav-link>

                @if (can('user_browse') or can('role_browse') or can('permission_browse'))
                {{--Users --}}
                <x-admin-nav-link title="Users Mangment" />
                {{-- Users --}}
                @can('user_browse')
                <x-admin-nav-link href="{{ route('admin.user.index') }}">
                    <i class="far fa-address-book"></i>
                    <span></span>
                    <span>User Managment</span>
                </x-admin-nav-link>
                @endcan
                {{-- Role --}}
                @can('user_status_management')
                <x-admin-nav-link href="{{ route('admin.user-status.index') }}">
                    <i class="fas fa-users-cog"></i>
                    <span></span>
                    <span> User Status </span>
                </x-admin-nav-link>
                @endcan
                {{-- Role --}}
                @can('user_role_management')
                <x-admin-nav-link href="{{ route('admin.role.index') }}">
                    <i class="fas fa-users-cog"></i>
                    <span></span>
                    <span> Role </span>
                </x-admin-nav-link>
                @endcan
                {{-- Permission --}}
                @can('user_permission_management')
                <x-admin-nav-link href="{{ route('admin.permission.index') }}">
                    <i class="fas fa-user-shield"></i>
                    <span></span>
                    <span>Permission</span>
                </x-admin-nav-link>
                @endcan
                @endif
                {{--Setting --}}
                @if(can('setting_management'))
                <x-admin-nav-link title="Tools" />
                @endif
                @can('setting_management')
                <x-admin-nav-link href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>Setting</span>
                    <span></span>
                </x-admin-nav-link>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
