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
                @php
                $portfolioContact=new App\Models\Portfolio\PortfolioContact;
                @endphp
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
                                <label for="type" class="font-black">Type</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option selected disabled>--Select One-----</option>
                                    @foreach ($portfolioContact->types() as $g)
                                    <option {{isset($item)?selected($item->type,$g):null}}>{{ $g }}</option>
                                    @endforeach
                                </select>
                                @error('product')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="name" class="font-black">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Name..." value="{{ isset($item)?$item->name:old('name') }}">
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
                                    placeholder="Enter Subject..."
                                    value="{{ isset($item)?$item->subject:old('subject') }}">
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
                                <label for="product" class="font-black">Product</label>
                                <select class="form-control" name="product" id="product">
                                    <option selected disabled>--Select One-----</option>
                                    @foreach ($portfolioContact->products() as $g)
                                    <option {{isset($item)?selected($item->product,$g):null}}>{{ $g }}</option>
                                    @endforeach
                                </select>
                                @error('product')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="delivery_time" class="font-black">Delivery Time</label>
                                <select class="form-control" name="delivery_time" id="delivery_time">
                                    <option selected disabled>--Select One-----</option>
                                    @foreach ($portfolioContact->deliveryTimes() as $g)
                                    <option {{isset($item)?selected($item->delivery_time,$g):null}}>{{ $g }}</option>
                                    @endforeach
                                </select>
                                @error('delivery_time')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="development_time" class="font-black">Development Time</label>
                                <select class="form-control" name="development_time" id="development_time">
                                    <option selected disabled>--Select One-----</option>
                                    @foreach ($portfolioContact->developmentTimes() as $g)
                                    <option {{isset($item)?selected($item->development_time,$g):null}}>{{ $g }}</option>
                                    @endforeach
                                </select>
                                @error('development_time')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="budget" class="font-black">Budget</label>
                                <select class="form-control" name="budget" id="budget">
                                    <option selected disabled>--Select One-----</option>
                                    @foreach ($portfolioContact->budgets() as $g)
                                    <option {{isset($item)?selected($item->budget,$g):null}}>{{ $g }}</option>
                                    @endforeach
                                </select>
                                @error('budget')
                                <p class="text-danger pt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group pt-1 pb-1">
                                <label for="project_description" class="font-black">Project Desciption</label>
                                <textarea name="project_description" id="project_description" class="form-control"
                                    placeholder="Enter Project Description...">{{ isset($item)?$item->project_description:old('project_description') }}</textarea>
                                @error('project_description')
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
