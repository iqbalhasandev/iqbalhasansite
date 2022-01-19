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


<body class="authentication-bg bg-primary">
    <!-- vue page -->
    <div class=" home-center">
        <div class="home-desc-center">
            <div class="container">
                <div id="vue-app">
                    {{ $slot }}
                </div>
                <!-- end vue page -->
            </div>


        </div>
        <!-- End Log In page -->
</body>
{{-- scripts --}}
<x-admin.scripts />

<x-fb-live-chat />
<x-toster-session />
<x-delete />
<x-google-translate />
</body>

</html>
