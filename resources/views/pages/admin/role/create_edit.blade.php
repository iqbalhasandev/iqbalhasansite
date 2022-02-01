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
                    action="{{ isset($item)?route('admin.role.update',$item->id):route('admin.role.store') }}"
                    method="POST" class=" needs-validation" novalidate>
                    @csrf
                    @isset($item)
                    @method('PUT')
                    @endisset

                    <div class=" row">
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Role Name..." value="{{ isset($item)?$item->name:old('name') }}"
                                    required>
                                @error('name')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

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
                                                        {{config('theme.cdata.edit')?(permission_check($item->permissions,$p->id)?'checked':''):''}}
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

                        <div class="col-md-12 ">
                            <div class="form-group pt-1 pb-1 text-center">
                                <button type="submit" class="btn btn-primary btn-round">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-card>
</x-app-layout>
