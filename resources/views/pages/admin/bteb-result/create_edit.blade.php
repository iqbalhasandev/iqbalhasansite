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
                                <label for="session" class="font-black">Session</label>
                                <input type="text" class="form-control" name="session" id="session"
                                    placeholder="Enter Session..."
                                    value="{{ isset($item)?$item->session:old('session') }}" required>
                                @error('session')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="fourth_semester" class="font-black">Fourth Semester Result</label>
                                <input type="file" class="form-control" name="fourth_semester" id="fourth_semester">
                                @if (config('theme.cdata.edit') && $item->url('4th'))
                                <a href="{{ $item->url('4th')}}" class="mt-1">View</a>
                                @endif

                                @error('fourth_semester')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="fifth_semester" class="font-black">Fifth Semester Result</label>
                                <input type="file" class="form-control" name="fifth_semester" id="fifth_semester">
                                @if (config('theme.cdata.edit') && $item->url('5th'))
                                <a href="{{ $item->url('5th')}}" class="mt-1">View</a>
                                @endif

                                @error('fifth_semester')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="sixth_semester" class="font-black">Sixth Semester Result</label>
                                <input type="file" class="form-control" name="sixth_semester" id="sixth_semester">
                                @if (config('theme.cdata.edit') && $item->url('6th'))
                                <a href="{{ $item->url('6th')}}" class="mt-1">View</a>
                                @endif

                                @error('sixth_semester')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="seventh_semester" class="font-black">Seventh Semester Result</label>
                                <input type="file" class="form-control" name="seventh_semester" id="seventh_semester">
                                @if (config('theme.cdata.edit') && $item->url('7th'))
                                <a href="{{ $item->url('7th')}}" class="mt-1">View</a>
                                @endif

                                @error('seventh_semester')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="eighth_semester" class="font-black">Eighth Semester Result</label>
                                <input type="file" class="form-control" name="eighth_semester" id="eighth_semester">
                                @if (config('theme.cdata.edit') && $item->url('8th'))
                                <a href="{{ $item->url('8th')}}" class="mt-1">View</a>
                                @endif

                                @error('eighth_semester')
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
