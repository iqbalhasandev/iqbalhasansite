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

                    <div class=" row">


                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="image" class="font-black">Gallery Image</label>
                                <input type="file" class="form-control" name="image" id="image"
                                    onchange="get_img_url(this, '#logoUrl');">

                                <img id="logoUrl" src="{{ config('theme.cdata.edit')?$item->image_url():'' }}"
                                    width="120px" class="mt-1">

                                @error('image')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="caption" class="font-black">Caption</label>
                                <textarea name="caption" id="caption" class="form-control"
                                    placeholder="Enter Image Caption...">{{ isset($item)?$item->caption:old('caption') }}</textarea>
                                @error('caption')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="url" class="font-black">Image Url</label>
                                <input type="url" class="form-control" name="url" id="site" placeholder="Enter url..."
                                    value="{{ isset($item)?$item->url:old('url') }}">
                                @error('url')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="group" class="font-black">Gallery Group</label>
                                <x-select2 class="form-control" name="group" id="group">
                                    @php
                                    $portfolioGallery=new App\Models\Portfolio\PortfolioGallery;
                                    @endphp
                                    @foreach ($portfolioGallery->groups() as $g)
                                    <option {{isset($item)?selected($item->group,$g):null}}>{{ $g }}</option>
                                    @endforeach

                                    <x-slot name="config">
                                        tags: true
                                    </x-slot>
                                </x-select2>
                                @error('url')
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
</x-app-layout>
