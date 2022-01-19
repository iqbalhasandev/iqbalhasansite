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


<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- vue page -->
        <div id="vue-app">
            <!-- start header -->
            <x-admin.header />
            <!-- end header -->

            <!-- start header -->
            <x-admin.left-sidebar />
            <!-- end header -->


            <div class=" main-content">

                <div class="page-content">
                    <!-- start page title -->
                    {{ $breadcrumb??'' }}
                    <!-- end page title -->

                    <div class="container-fluid">
                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <!-- start footer -->
                <x-admin.footer />
                <!-- end footer -->

            </div>
            <!--end  vue page -->
            <!-- end main content-->
        </div>

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    <x-admin.right-sidebar />
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- start scripts -->
    <x-admin.scripts />
    <!-- end scripts -->
    <x-fb-live-chat />
    <x-toster-session />
    <x-delete />
    <x-google-translate />
</body>

</html>
