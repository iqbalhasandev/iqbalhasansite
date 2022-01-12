@if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
<div>
    <h3>Delete Account</h3>
    <p>Permanently delete your account.</p>
    <hr>
</div>
<div class="content">
    <div class="max-w-xl text-sm text-gray-600">
        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your
        account, please download any data or information that you wish to retain.
    </div>

    <div class="form-group mt-10">
        <button class="btn btn-danger" type="button" onclick="PaaswordConfrim()">Delete Account</button>
    </div>
</div>
<form action="{{ route('admin.user.profile.settings.update',['active_tab'=>'delete-account']) }}"
    id="PaaswordConfrimForm" method="POST">
    @csrf
    <input type="hidden" id="PaaswordConfrimFormPassword" name="current_password">
</form>

@push('extra-scripts')
<script>
    function PaaswordConfrim() {
        Swal.fire({
                title: "Confirm Password",
                text: "For your security, please confirm your password to continue.",
                input: 'password',
                inputAttributes: {
                autocapitalize: 'password',
                placeholder:'Enter Your Password',
                required:'required'
                },
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#49cdd0",
                cancelButtonColor: "#d33",
                confirmButtonText: "Confirm",
                confirmButtonClass: "btn ",
                cancelButtonClass: "btn btn-danger ml-1",
                buttonsStyling: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Password field can\'t be empty'
                    }
                }
            }).then(function (result) {
                if (result.value) {
                    $("#PaaswordConfrimFormPassword").val(result.value);
                    $("#PaaswordConfrimForm").submit();
                }
            });
    }

</script>
@endpush
@endif
