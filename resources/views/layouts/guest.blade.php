<!doctype html>
<html lang="en">

<head>
    {{-- meta manager --}}
    <x-meta-manager />
    {{-- favicon --}}
    <x-favicon />
    {{-- style --}}
    <x-admin.styles />
</head>


<body {{ $attributes->merge(['class'=>'']) }}>
    <div class=" home-btn d-none d-sm-block">
        <a href="{{ back_url() }}" class="btn btn-info btn-rounded waves-effect waves-light">
            <i class="fas fa-reply"></i> Back
        </a>
    </div>


    <div class="account-pages my-5 pt-5 ">
        <div class="container">
            <!-- vue page -->
            <div id="vue-app">
                {{ $slot }}
            </div>
            <!--end vue page -->
        </div>
    </div>
    <!-- end Account pages -->



    <x-admin.scripts />

    <x-fb-live-chat />
    <x-toster-session />
    <x-delete />
    <x-google-translate />
</body>

</html>
