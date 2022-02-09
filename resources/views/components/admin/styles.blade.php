@livewireStyles
<!-- app css -->
<link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Bootstrap Css -->
<link href="{{ admin_asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ admin_asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- sweetalert2 Css -->
<link rel="stylesheet" href="{{admin_asset('libs/sweet-alert2/sweetalert2.min.css')}}">
<!-- toastr Css -->
<link rel="stylesheet" href="{{admin_asset('libs/toastr/toastr.min.css')}}">
@stack('lib-styles')
<!-- App Css-->
<link href="{{ admin_asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<style>
    .swal2-confirm.btn.btn-primary {
        margin-right: 5px
    }

    .text-left {
        text-align: left !important;
    }
</style>
@stack('extra-styles')
