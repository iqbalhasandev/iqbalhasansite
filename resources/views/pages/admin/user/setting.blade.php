<x-app-layout>

    <x-slot name="breadcrumb">
        <x-admin.breadcrumb>
            @foreach (config('theme.cdata.breadcrumb') as $i )
            <x-admin.bread-item href="{{ $i['link'] }}" class="{{ $i['link']?'':'active' }}">
                {{ $i['name'] }}
            </x-admin.bread-item>
            @endforeach
            <x-slot name="title">
                {{ config('theme.cdata.title') }}
            </x-slot>
        </x-admin.breadcrumb>
    </x-slot>

    <x-card>
        <x-slot name="title">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h4 class="">{{ config('theme.cdata.title') }}</h4>
                </div>
                <div class="">
                    @can('user_create')
                    @if (config('theme.cdata.add'))
                    <a href="{{ config('theme.cdata.add') }}"
                        class="btn btn-primary btn-rounded waves-effect waves-light">
                        <i class="far fa-plus-square"></i> Add New
                    </a>
                    @endif
                    @endcan

                    @if (config('theme.cdata.back'))
                    <a href="{{ config('theme.cdata.back') }}"
                        class="btn btn-info btn-rounded waves-effect waves-light">
                        <i class="fas fa-reply"></i> Back
                    </a>
                    @endif
                </div>
            </div>
        </x-slot>

        <div class="row" style="padding: 50px 0">
            <div class="col-md-3">
                <ul class="setting-nav ">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <li class="{{ $active_tab=='general-info'?'active':'' }}">
                        <a href="{{ route('admin.user.profile.settings',['active_tab'=>'general-info']) }}">
                            General Info
                        </a>
                    </li>
                    @endif
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <li class="{{ $active_tab=='update-password'?'active':'' }}">
                        <a href="{{ route('admin.user.profile.settings',['active_tab'=>'update-password']) }}">
                            Update Password
                        </a>
                    </li>
                    @endif
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <li class="{{ $active_tab=='two-factor-authentication'?'active':'' }}"><a
                            href="{{ route('admin.user.profile.settings',['active_tab'=>'two-factor-authentication']) }}">
                            Two Factor Authentication
                        </a>
                    </li>
                    @endif

                    <li class="{{ $active_tab=='browser-sessions'?'active':'' }}"><a
                            href="{{ route('admin.user.profile.settings',['active_tab'=>'browser-sessions']) }}">
                            Browser Sessions
                        </a>
                    </li>
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <li class="{{ $active_tab=='delete-account'?'active':'' }}"><a
                            href="{{ route('admin.user.profile.settings',['active_tab'=>'delete-account']) }}">
                            Delete Account
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-9">
                <div class="setting-content">
                    @switch($active_tab)
                    @case('general-info')
                    <x-profile.general-info :user="$user" />
                    @break
                    @case('update-password')
                    <x-profile.update-password :user="$user" />
                    @break
                    @case('two-factor-authentication')
                    <x-profile.two-factor-authentication :data="$data" :user="$user" />
                    @break
                    @case('browser-sessions')
                    <x-profile.browser-sessions :data="$data" :user="$user" />
                    @break
                    @case('delete-account')
                    <x-profile.delete-account :user="$user" />
                    @break
                    @default
                    <p class="text-center text-muted">No Setting Found..</p>
                    @endswitch
                </div>
            </div>
        </div>
    </x-card>
    @push('extra-styles')
    <style>
        .setting-nav {
            padding: 10px 5px;
            background: transparent;
            list-style: none;
        }

        .setting-content {
            box-shadow: 1px 1px 7px 5px rgba(0, 0, 0, 0.02);
            padding: 15px 1rem;
        }

        .setting-content h3 {
            margin: 10px 0px;
        }

        .setting-nav li a {
            border-radius: 5px;
            padding: 15px 10px;
            margin: 20px 0;
            display: block;
        }

        .setting-nav li a:hover {
            background-color: rgb(202, 202, 202);
            cursor: pointer;
        }

        .setting-nav li.active a {
            background-color: #49cdd0;

        }

        .setting-nav li.active a {
            color: rgb(255, 255, 255);

        }

        .setting-nav li a {
            color: rgb(0, 0, 0);
        }
    </style>
    @endpush
</x-app-layout>
