<div class="row justify-content-center">
    <div class="col-md-9 col-lg-7 col-xl-6">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center w-75 m-auto">
                    <<x-logo type="light" />
                    {{ $subText??'' }}
                </div>
                @isset($title)
                <h5 class="auth-title">{{ $title }}</h5>
                @endisset
                {{ $slot }}
            </div> <!-- end card-body -->
        </div>
        <!-- end card -->
        @isset($footerContent)
        <div class="row mt-3">
            <div class="col-12 text-center">
                {{ $footerContent }}
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        @endisset
    </div>
</div>
