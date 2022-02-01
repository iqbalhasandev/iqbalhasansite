<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ config('app.url') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <x-logo type="sm" />
                    </span>
                    <span class="logo-lg">
                        <x-logo type="dark" />
                    </span>
                </a>

                <a href="{{ config('app.url') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <x-logo type="sm" />
                    </span>
                    <span class="logo-lg">
                        <x-logo type="light" />
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <div class="d-flex">

            <div class="pt-2 d-lg-inline-block">
                <a href="javascript:void(0);">
                    <span class="nav-link waves-effect" id="google_translate_element"></span>
                </a>
            </div>

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item toggle-search noti-icon waves-effect"
                    data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="mdi mdi-bell-outline bx-tada"></i>
                    {{-- <span class="badge bg-danger rounded-pill">3</span> --}}
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                {{-- <a href="#!" class="small"> View All</a> --}}
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <p class="text-center text-muted pt-5 pb-5 notify-item">No Notification Found..</p>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ auth()->user()->profile_photo_url}}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('admin.user.profile') }}"><i
                            class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="javascript:void();"><i
                            class="mdi mdi-wallet-outline font-size-16 align-middle me-1"></i>
                        My Wallet
                    </a>

                    <a class="dropdown-item d-block" href="{{ route('admin.user.profile.settings') }}">
                        <i class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.lock-screen') }}"><i
                            class="mdi mdi-lock-open-outline font-size-16 align-middle me-1"></i>
                        Lock Screen
                    </a>
                    <div class="dropdown-divider"></div>
                    <x-logout class="dropdown-item notify-item">
                        <span class="dropdown-item text-danger">
                            <i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i>
                            Logout
                        </span>
                    </x-logout>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-cog-outline font-size-20"></i>
                </button>
            </div>

        </div>
    </div>
</header>
