<x-guest-layout>
    <x-box-card box-size="col-md-8 col-lg-6 col-xl-6">
        <x-slot name="title">
            <img src="{{ admin_asset('images/maintenance.png') }}" alt="" class="img-fluid mx-auto d-block"
                style="max-height: 400px">
            <div class="mt-5">
                <h3>BTEB RESULT MANAGMENT SYSTEM</h3>
                <p>Get Your Result Easily</p>
            </div>
            <form enctype="multipart/form-data" action="{{ route('bteb-result.result') }}" method="POST"
                class=" needs-validation text-left" novalidate>
                @csrf
                @if(config('theme.cdata.edit'))
                @method('PUT')
                @endif
                <div class=" row">

                    <div class="col-md-12">
                        <div class="form-group pt-1 pb-1">
                            <label for="roll" class="font-black ">Roll</label>
                            <input type="number" class="form-control" name="roll" id="roll"
                                placeholder="Enter Your Roll..." value="{{ isset($item)?$item->roll:old('roll') }}">
                            @error('roll')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group pt-1 pb-1">
                            <label for="session" class="font-black">Session</label>
                            <select name="session" id="session" class="form-control">
                                @foreach ($collection as $item)
                                <option>{{ $item->session }}</option>
                                @endforeach
                            </select>

                            @error('session')
                            <p class="text-danger pt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <p class="mt-2 mb-2 text-muted">
                        <strong>Note</strong>
                        Results are displayed using pdf searching algorithm. The result is shown by searching from the
                        PDF published by "BTEB". The
                        <strong>
                            developer or this web site is not responsible for any
                            misinformation.
                        </strong>
                    </p>
                    <div class="col-md-12 mt-5">
                        <div class="form-group pt-1 pb-1 text-center">
                            <button type="submit" class="btn btn-primary btn-round">Get Result</button>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-box-card>

</x-guest-layout>
