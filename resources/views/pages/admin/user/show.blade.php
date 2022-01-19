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

    <x-card class="container">
        <x-slot name="title">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h4>
                        {{ config('theme.cdata.title') }}
                    </h4>
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
            <div class="col-sm-12">
                <div class="card member-card">

                    <div class=" d-sm-flex justify-content-center">
                        <img src="{{ $user->profile_photo_url}}" class="rounded-circle" alt="profile-image" style="
                                width: 150px;
                                height: 150px;
                                ">
                    </div>
                    <hr>
                    <div class="text-center">
                        <h4 class="m-t-10">{{ $user->name }}</h4>
                        <p>
                            {!! get_user_role($user)->name??'<span class="badge badge-danger">User role
                                not
                                selected</span>' !!}
                        </p>
                    </div>
                    <hr>
                    <div class="body ">
                        <div class="d-flex justify-content-end">
                            @isset($profile)
                            <a href="{{ route('admin.user.profile.settings', $user->id) }}"
                                class="btn btn-info btn-round">
                                <i class="zmdi zmdi-edit"></i> Settings
                            </a>
                            @else
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info btn-round">
                                <i class="zmdi zmdi-edit"></i> Edit
                            </a>
                            @endisset

                        </div>
                        <div class="container">
                            <div class="row text-left ">
                                <div class="col-md-6">
                                    <p>
                                        <span class="h4 p-1">Name: </span>
                                        {{ $user->name }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <span class="h4 p-1">Email: </span>
                                        <a href="mailto:{{ $user->email }}"> {{ $user->email }}</a>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <span class="h4 p-1">Role: </span>
                                        {!! get_user_role($user)->name??'<span class="badge badge-danger">User role
                                            not
                                            selected</span>' !!}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <span class="h4 p-1">Status: </span>
                                        {{ $user->status->name }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <span class="h4 p-1">Account Created at: </span>
                                        {{ $user->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-app-layout>
