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
                    <h4 class="text-capitalize">
                        {{ config('theme.cdata.title') }}
                    </h4>
                </div>
                <div class="text-capitalize">
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

                    <div class="col-md-12">
                        <div class="form-group pt-1 pb-1">
                            <label for="title" class="font-black">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title..."
                                value="{{ isset($item)?$item->title:old('title') }}" required>
                            @error('title')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group pt-1 pb-1">
                            <label for="slug" class="font-black">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Slug..."
                                value="{{ isset($item)?$item->slug:old('slug') }}" required>
                            @error('slug')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="body" class="font-black">Body</label>
                                <textarea id="elm1" name="body">{!! isset($item)?$item->body:old('body') !!}</textarea>
                                @error('body')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="image" class="font-black">Image</label>
                                <input type="file" class="form-control" name="image" id="image"
                                    onchange="get_img_url(this, '#logoUrl');">
                                @if (config('theme.cdata.edit') && $item->image)
                                <img id="logoUrl" src="{{ config('theme.cdata.edit')?$item->image_url():'' }}"
                                    width="120px" class="mt-1">
                                @endif

                                @error('image')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="meta_keywords" class="font-black">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                                    placeholder="Enter Meta Keywords Name..."
                                    value="{{ isset($item)?$item->meta_keywords:old('meta_keywords') }}" required>
                                @error('meta_keywords')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="statusID" class="font-black">Status</label>
                                <select name="status" id="statusID" class="form-control">
                                    <option value="0" {{ isset($item)?selected($item->status,0):''}}>
                                        Inactive
                                    </option>
                                    <option value="1" {{isset($item)?selected($item->status,1):''}}>
                                        Active
                                    </option>
                                </select>

                                @error('status')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group pt-1 pb-1 text-left">
                                <button type="submit" class="btn btn-primary btn-round">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-card>

    @push('lib-styles')
    <!-- Summernote css -->
    <link href="{{ admin_asset('libs/summernote/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @push('extra-styles')

    @endpush
    @push('lib-scripts')
    <!--tinymce js-->
    <script src="{{ admin_asset('libs/tinymce/tinymce.min.js')}}"></script>

    <!-- Summernote js -->
    <script src="{{ admin_asset('libs/summernote/summernote-bs4.min.js')}}"></script>
    @endpush
    @push('extra-scripts')


    <!-- init js -->
    <script src="{{ admin_asset('js/pages/form-editor.init.min.js')}}"></script>
    @endpush
</x-app-layout>
