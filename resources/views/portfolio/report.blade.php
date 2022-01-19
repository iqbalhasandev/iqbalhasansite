<x-guest-layout>
    <x-box-card>
        <x-slot name="title">
            <img src="{{ admin_asset('images/maintenance.png') }}" alt="" class="img-fluid mx-auto d-block"
                style="max-height: 400px">
            <div class="mt-5">
                <h3>Report your problem ?</h3>
            </div>
            <form enctype="multipart/form-data" action="{{ route('portfolio.report-issue.store') }}" method="POST"
                class=" needs-validation text-left" novalidate>
                @csrf
                @if(config('theme.cdata.edit'))
                @method('PUT')
                @endif
                <div class=" row">

                    <div class="col-md-12">
                        <div class="form-group pt-1 pb-1">
                            <label for="name" class="font-black ">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name..."
                                value="{{ isset($item)?$item->name:old('name') }}">
                            @error('name')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group pt-1 pb-1">
                            <label for="email" class="font-black">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter Email..." value="{{ isset($item)?$item->email:old('email') }}">
                            @error('email')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group pt-1 pb-1">
                            <label for="subject" class="font-black">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Enter Subject..." value="{{ isset($item)?$item->subject:old('subject') }}">
                            @error('subject')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group pt-1 pb-1">
                            <label for="message" class="font-black">Message</label>
                            <textarea name="message" id="message" class="form-control"
                                placeholder="Enter Message...">{{ isset($item)?$item->message:old('message') }}</textarea>
                            @error('message')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group pt-1 pb-1">
                            <label for="file" class="font-black">Project File</label>
                            <input type="file" class="form-control" name="file" id="file"
                                onchange="get_img_url(this, '#logoUrl');">
                            @if (config('theme.cdata.edit') && $item->file )
                            <a href="{{ $item->file_url() }}" target="_blank">View</a>
                            @endif
                            @error('file')
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
        </x-slot>
    </x-box-card>

</x-guest-layout>
