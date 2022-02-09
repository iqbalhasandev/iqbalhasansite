{{-- <a href="javascript:void();" onclick="delete_action({{ route('user.delete',$user->id) }})"></a> --}}

<form action="" method="POST" id="delete-form" style="display: none">
    @csrf
    @method('Delete')
</form>
{{-- @push('extra-scripts') --}}
<script src="{{admin_asset('js/delete.min.js')}}"></script>
{{-- @endpush --}}
