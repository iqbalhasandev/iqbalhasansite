<table id="datatable-buttons" {{ $attributes->merge(['class'=>'table table-striped table-bordered dt-responsive']) }}>
    {{ $slot }}
</table>




@push('lib-styles')
<!-- DataTables -->
<link href="{{ admin_asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ admin_asset('libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ admin_asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
@endpush


@push('lib-scripts')
<!-- Required datatable js -->
<script src="{{ admin_asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ admin_asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ admin_asset('libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ admin_asset('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ admin_asset('libs/jszip/jszip.min.js') }}"></script>
<script src="{{ admin_asset('libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ admin_asset('libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ admin_asset('libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ admin_asset('libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ admin_asset('libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ admin_asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ admin_asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ admin_asset('js/pages/datatables.init.min.js') }}"></script>
@endpush
