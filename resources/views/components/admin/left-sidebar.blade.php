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
                {{-----------------------------------------------------------
                ---------------- Portfolio Managment Start ---------------
                -------------------------------------------------------------}}
                @can('portfolio_management')
                {{--Users --}}
                <x-admin-nav-link title="Portfolio Mangment" />
                {{-- Client --}}
                <x-admin-nav-link href="{{ route('admin.portfolio.client.index') }}">
                    <i class="fas fa-user-ninja"></i>
                    <span></span>
                    <span>Client Managment</span>
                </x-admin-nav-link>
                {{-- Education--}}
                <x-admin-nav-link href="{{ route('admin.portfolio.education.index') }}">
                    <i class="fas fa-user-graduate"></i>
                    <span></span>
                    <span>Education Managment</span>
                </x-admin-nav-link>
                {{-- Expertis--}}
                <x-admin-nav-link href="{{ route('admin.portfolio.expertise.index') }}">
                    <i class="fas fa-sign"></i>
                    <span></span>
                    <span>Expertis Managment</span>
                </x-admin-nav-link>
                {{-- Gallery--}}
                <x-admin-nav-link href="{{ route('admin.portfolio.gallery.index') }}">
                    <i class="fas fa-images"></i>
                    <span></span>
                    <span>Gallery Managment</span>
                </x-admin-nav-link>
                {{-- Services--}}
                <x-admin-nav-link href="{{ route('admin.portfolio.service.index') }}">
                    <i class="far fa-building"></i>
                    <span></span>
                    <span>Service Managment</span>
                </x-admin-nav-link>
                {{-- Skill--}}
                <x-admin-nav-link href="{{ route('admin.portfolio.skill.index') }}">
                    <i class="fab fa-cloudsmith"></i>
                    <span></span>
                    <span>Skill Managment</span>
                </x-admin-nav-link>
                {{-- Testimonial--}}
                <x-admin-nav-link href="{{ route('admin.portfolio.testimonial.index') }}">
                    <i class="far fa-address-card"></i>
                    <span></span>
                    <span>Testimonial Managment</span>
                </x-admin-nav-link>
                {{-- Testimonial--}}
                <x-admin-nav-link href="{{ route('admin.portfolio.contact.index') }}">
                    <i class="fab fa-facebook-messenger"></i>
                    <span></span>
                    <span>Contact Managment</span>
                </x-admin-nav-link>
                {{-- Setting--}}
                <x-admin-nav-link href="{{ route('admin.portfolio.settings.index') }}">
                    <i class="fas fa-cog"></i>
                    <span></span>
                    <span>Portfolio Setting</span>
                </x-admin-nav-link>
                @endcan
                {{-----------------------------------------------------------
                ---------------- Portfolio Managment End ---------------
                -------------------------------------------------------------}}


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
