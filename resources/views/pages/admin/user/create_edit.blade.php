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
                    @if (config('theme.cdata.add'))
                    <a href="{{ config('theme.cdata.add') }}"
                        class="btn btn-primary btn-rounded waves-effect waves-light">
                        <i class="far fa-plus-square"></i> Add New
                    </a>
                    @endif

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
                <form enctype="multipart/form-data"
                    action="{{ config('theme.cdata.edit')?config('theme.cdata.update'):config('theme.cdata.store') }}"
                    method="POST" class=" needs-validation" novalidate>
                    @csrf
                    @if(config('theme.cdata.edit'))
                    @method('PUT')
                    @endif

                    <div class=" row">
                        <div class="col-md-6">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"
                                    value="{{ config('theme.cdata.edit')?$data->name:old('name') }}" required>
                                @error('name')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pt-1 pb-1">
                                <label for="email" class="font-black">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Email"
                                    value="{{ config('theme.cdata.edit')?$data->email:old('email') }}" required>
                                @error('email')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 pt-1 pb-1">
                            <div class="form-group">
                                <label for="role" class="font-black">User Role</label>
                                <select class="form-control show-tick" name="role" id="role" required>
                                    <option selected disabled>--Select User Role--</option>
                                    @foreach (App\Models\Admin\Role::cacheData() as $role)
                                    <option value="{{ $role->id }}"
                                        {{config('theme.cdata.edit')?selected(get_user_role($data)->
                                        id??'',$role->id):null}}>
                                        {{ $role->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('role')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 pt-1 pb-1">
                            <div class="form-group">
                                <label for="user_status_id" class="font-black">Account Status</label>
                                <select class="form-control show-tick" name="user_status_id" id="user_status_id"
                                    required>
                                    <option selected disabled>--Select Account Status--</option>
                                    @foreach (App\Models\Admin\UserStatus::cacheData() as $status)
                                    <option value="{{ $status->id}}" {{ config('theme.cdata.edit')?selected( $data->
                                        user_status_id,$status->id):null}}>
                                        {{ $status->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('user_status_id')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 pt-1 pb-1">
                            <div class="form-group">
                                <label for="password" class="font-black">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Enter Password" {{ config('theme.cdata.edit')?'':'required' }}
                                    autocomplete="new-password">
                                @error('password')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 pt-1 pb-1">
                            <div class="form-group">
                                <label for="password_confirmation" class="font-black">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="Retype Password" {{
                                    config('theme.cdata.edit')?'':'required' }} autocomplete="new-password">
                                @error('password_confirmation')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 pt-1 pb-1">
                            <div class="form-group">
                                <label for="avatar" class="font-black">Avatar</label>
                                <input type="file" class="form-control" name="avatar" id="avatar"
                                    onchange="get_img_url(this, '#avatar_image');" placeholder="select avatar image">
                                <img id="avatar_image"
                                    src="{{ config('theme.cdata.edit')?$data->profile_photo_url:'' }}" width="120px"
                                    class="mt-1">
                                @error('avatar')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- --}}



                        <div class="col-md-12 pt-1 pb-1">
                            <div>
                                <h5 class="border-bottom border-top py-1 mx-1 mb-0 font-medium-2 font-black">
                                    <i class="feather icon-lock mr-50 "></i>
                                    Permission
                                </h5>
                                <div class="row mt-1">
                                    @foreach (App\Models\Admin\Permission::all() as $p)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="{{ $p->name }}"
                                                        name="permissions[{{ $p->id }}]" value="{{ $p->id }}"
                                                        class="custom-control-input"
                                                        {{config('theme.cdata.edit')?(permission_check($data->getDirectPermissions(),$p->id)?'checked':''):''}}
                                                    >
                                                    <label class="custom-control-label h6" for="{{ $p->name }}">
                                                        {{permission_key_to_name($p->name)}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- --}}
                        <div class="col-md-12 ">
                            <div class="form-group pt-1 pb-1">
                                <button type="submit" class="btn btn-primary btn-round">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-card>
</x-app-layout>
