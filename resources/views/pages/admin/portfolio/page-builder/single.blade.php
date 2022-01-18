<x-guest-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center mb-5">
                <x-logo />
                <br>
                <br>
                <h2 class="mt-5">{{ $item->title }}</h2>
                @if ($item->image)
                <div class="mt-4">
                    <img src="{{ $item->image_url() }}" class="img-fluid">
                </div>
                @endif

                <div class="row justify-content-center mt-5 pt-3">
                    <div class="col-md-8">
                        {!! $item->body !!}
                    </div> <!-- end col-->
                </div> <!-- end row-->
                <x-admin.auth-footer class="text-black" />
            </div>
        </div>
    </div>
</x-guest-layout>
