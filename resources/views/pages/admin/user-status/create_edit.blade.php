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
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Name..."
                                    value="{{ config('theme.cdata.edit')?$data->name:old('name') }}" required>
                                @error('name')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
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
