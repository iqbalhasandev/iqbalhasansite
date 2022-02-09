<script src="{{ asset('js/app.js') }}"></script>
@livewireScripts()
<!-- JAVASCRIPT -->
<script src="{{ admin_asset('libs/jquery/jquery.min.js') }}"></script>
<script src="{{ admin_asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ admin_asset('libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ admin_asset('libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ admin_asset('libs/node-waves/waves.min.js') }}"></script>
<script src="{{admin_asset('libs/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{admin_asset('libs/toastr/toastr.min.js')}}"></script>
@stack('lib-scripts')
<script src="{{ admin_asset('js/app.min.js') }}"></script>
<script src="{{ admin_asset('js/img-src.min.js') }}"></script>
@stack('extra-scripts')
