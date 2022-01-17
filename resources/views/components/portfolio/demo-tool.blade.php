<!--removeIf(delDemoTool)-->
<!-- inject:demoToolHTML:html -->
<div class="demo-tool">
    <div class="tool-wrapper">
        <span class="tool-toggler"><i class="icon ion-md-settings"></i></span>
        <div class="tool-box">
            <h5 class="title">Colors:</h5>
            <ul class="list-inline color-switcher mb-0">
                <li class="list-inline-item" style="background-color: #EE3158;" data-path="css/colors/main-redpink.css">
                </li>
                <li class="list-inline-item" style="background-color: #007bff;" data-path="css/colors/main-blue.css">
                </li>
                <li class="list-inline-item" style="background-color: #17a2b8;" data-path="css/colors/main-cyan.css">
                </li>
                <li class="list-inline-item" style="background-color: #3365b0;"
                    data-path="css/colors/main-darkblue.css"></li>
                <li class="list-inline-item" style="background-color: #a435b7;"
                    data-path="css/colors/main-darkmagenta.css"></li>
                <li class="list-inline-item" style="background-color: #c93e70;"
                    data-path="css/colors/main-darkpink.css"></li>
                <li class="list-inline-item" style="background-color: #bf2a3d;" data-path="css/colors/main-darkred.css">
                </li>
                <li class="list-inline-item" style="background-color: #28a745;" data-path="css/colors/main-green.css">
                </li>
                <li class="list-inline-item" style="background-color: #6610f2;" data-path="css/colors/main-indigo.css">
                </li>
                <li class="list-inline-item" style="background-color: #fd7e14;" data-path="css/colors/main-orange.css">
                </li>
                <li class="list-inline-item" style="background-color: #e83e8c;" data-path="css/colors/main-pink.css">
                </li>
                <li class="list-inline-item" style="background-color: #6f42c1;" data-path="css/colors/main-purple.css">
                </li>
                <li class="list-inline-item" style="background-color: #dc3545;" data-path="css/colors/main-red.css">
                </li>
                <li class="list-inline-item" style="background-color: #20c997;" data-path="css/colors/main-teal.css">
                </li>
                <li class="list-inline-item" style="background-color: #333;" data-path="css/colors/main-dark.css">
                </li>
                <li class="list-inline-item" style="background-color: #78b230;"
                    data-path="css/colors/main-yellowgreen.css"></li>
                <li class="list-inline-item" style="background-color: #E16F7C;"
                    data-path="css/colors/main-tangopink.css"></li>
                <li class="list-inline-item" style="background-color: #6F73D2;"
                    data-path="css/colors/main-moodyblue.css"></li>
                <li class="list-inline-item" style="background-color: #664C43;" data-path="css/colors/main-brown.css">
                </li>
            </ul>
        </div>
    </div>
</div>
@push('extra-scripts')
<!--removeIf(delDemoTool)-->
<!-- inject:demoToolJS:js -->
<script src="{{ portfolio_asset('demo_tool/demo-tool.js') }}"></script>
<!-- endinject -->
<!--endRemoveIf(delDemoTool)-->
@endpush
