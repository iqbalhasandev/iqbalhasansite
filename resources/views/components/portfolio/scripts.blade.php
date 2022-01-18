@props(['design'])
<!-- endinject -->
<!--endRemoveIf(delDemoTool)-->
<!-- JS Assets -->
<script src="{{ portfolio_asset('js/jquery.min.js') }}"></script>
<script src="{{ portfolio_asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ portfolio_asset('js/jquery.nav.js') }}"></script>
<script
    src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Set,Array.from,Object.assign,Array.prototype.find,Array.prototype.includes">
</script>
<script src="{{ portfolio_asset('js/shuffle.min.js') }}"></script>
<script src="{{ portfolio_asset('js/lity.min.js') }}"></script>
<!-- <script src="{{ portfolio_asset('js/owl.carousel.min.js') }}"></script> -->
<script src="{{ portfolio_asset('js/swiper.min.js') }}"></script>
<script src="{{ portfolio_asset('assets/js/wow.js') }}"></script>
<script src="{{admin_asset('libs/toastr/toastr.min.js')}}"></script>

<script src="{{ portfolio_asset('js/main.js') }}"></script>
<script src="{{ portfolio_asset('js/custom.js') }}"></script>
<script src="{{ portfolio_asset('js/particles.js') }}"></script>
<script src="{{ portfolio_asset('js/variants/'.$design.'.js') }}"></script>
@stack('extra-scripts')
