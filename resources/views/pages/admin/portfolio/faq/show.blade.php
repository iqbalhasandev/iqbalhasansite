<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="text-center mb-5">
                <x-logo />
                <br><br>
                <h4 class="mt-4">What people ask?</h4>
                <p>.</p>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row pt-4 align-items-center justify-content-center">
        <div class="col-sm-5">
            <div class="">
                <img src="{{ admin_asset('images/coming-soon.png') }}" alt="" class="img-fluid mx-auto d-block">
            </div>
        </div>
        <div class="col-lg-6 ms-lg-auto">
            <div class="mt-5 mt-lg-0">
                @foreach ($portfolioFaq as $key=>$faq)
                <div class="card maintenance-box">
                    <div class="card-body p-4">
                        <div class="media">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title text-white rounded-circle bg-primary">
                                    {{ $key+1 }}
                                </span>
                            </div>
                            <div class="media-body">
                                <h5 class="font-size-18 text-uppercase">{{ $faq->question }}</h5>
                                <p class="text-muted mb-0">{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
    <x-admin.auth-footer class="text-black" />

</x-guest-layout>
