@props(['boxSize'=>'col-md-8 col-lg-6 col-xl-5'])
<div class="home-center">
    <div class="home-desc-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="{!! $boxSize !!}">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-2 py-3">
                                <div class="text-center">
                                    <a class="navbar-brand" href="{{ route('portfolio') }}">
                                        <x-logo type="dark" />
                                    </a>
                                    @isset($title){{ $title }} @endisset
                                </div>
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                    @isset($footer)
                    <div class="mt-5 text-center text-white">
                        {{ $footer }}
                    </div>
                    @endisset
                    <x-admin.auth-footer class="text-black" />
                </div>
            </div>
        </div>
        <!-- End Log In page -->
    </div>
