@props(['design'])
<!-- endinject -->
<!--endRemoveIf(delDemoTool)-->
<!-- JS Assets -->
<script src="{{ portfolio_asset('js/jquery.min.js') }}"></script>
<script src="{{ portfolio_asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ portfolio_asset('js/jquery.nav.min.js') }}"></script>
<script
    src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Set,Array.from,Object.assign,Array.prototype.find,Array.prototype.includes">
</script>
<script src="{{ portfolio_asset('js/shuffle.min.js') }}"></script>
<script src="{{ portfolio_asset('js/lity.min.js') }}"></script>
<!-- <script src="{{ portfolio_asset('js/owl.carousel.min.js') }}"></script> -->
<script src="{{ portfolio_asset('js/swiper.min.js') }}"></script>
<script src="{{ portfolio_asset('js/wow.min.js') }}"></script>
<script src="{{admin_asset('libs/toastr/toastr.min.js')}}"></script>

<script src="{{ portfolio_asset('js/main.min.js') }}"></script>
<script src="{{ portfolio_asset('js/custom.min.js') }}"></script>
<script src="{{ portfolio_asset('js/particles.min.js') }}"></script>
<script src="{{ portfolio_asset('js/variants/'.$design.'.min.js') }}"></script>
@stack('extra-scripts')
