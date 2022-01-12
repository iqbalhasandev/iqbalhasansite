@if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
<div>
    <h3>Two Factor Authentication</h3>
    <p>Add additional security to your account using two factor authentication.</p>
    <hr>
</div>
<div class="content">

    <h3 class="text-lg font-medium text-gray-900">
        @if ($data['enabled'])
        You have enabled two factor authentication.
        @else
        You have not enabled two factor authentication.
        @endif
    </h3>

    <div class="mt-3 max-w-xl text-sm text-gray-600">
        <p>
            When two factor authentication is enabled, you will be prompted for a secure, random token during
            authentication. You may retrieve this token from your phone's <a
                href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2"
                target="_blank" class="text-info font-weight-bold">Google Authenticator Application.</a>
        </p>
    </div>


    @if ($data['enabled'])
    @if ($data['showingQrCode'])
    <div class="mt-4 max-w-xl text-sm text-gray-600">
        <p class="font-semibold">
            Two factor authentication is now enabled. Scan the following QR code using your phone's <a
                href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2"
                target="_blank" class="text-info font-weight-bold">Google authenticator application.</a>
        </p>
    </div>

    <div class="mt-4">
        {!! $user->twoFactorQrCodeSvg() !!}
    </div>
    @endif

    @if ($data['showingRecoveryCodes'])
    <div class="mt-4 max-w-xl text-sm text-gray-600">
        <p class="font-semibold">
            Store these recovery codes in a secure password manager. They can be used to recover access to your account
            if your two factor authentication device is lost.
        </p>
    </div>

    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
        @foreach (json_decode(decrypt($user->two_factor_recovery_codes), true) as $code)
        <div>{{ $code }}</div>
        @endforeach
    </div>
    @endif
    @endif


    <div class="mt-5">
        @if (! $data['enabled'])
        <button type="button" onclick="twofactore('enable')" class="btn btn-primary">Enable</button>
        @else
        @if ($data['showingRecoveryCodes'])
        <button type="button" onclick="twofactore('regenerate_code')" class="btn btn-info ">Regenerate Recovery
            Codes</button>
        @else
        <button type="button" onclick="twofactore('show_code')" class="btn btn-info ">Show Recovery Codes</button>
        @endif
        <button type="button" onclick="twofactore('disable')" class="btn btn-primary ">Disable</button>
        @endif
    </div>

    <form action="{{ route('admin.user.profile.settings.update',['active_tab'=>'two-factor-authentication']) }}"
        id="twofactoreForm" method="POST">
        @csrf
        <input type="hidden" id="twofactoreFormAction" name="action">
        <input type="hidden" id="twofactoreFormPassword" name="current_password">
    </form>
</div>

@push('extra-scripts')
<script>
    function twofactore(action) {
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
                    $("#twofactoreFormAction").val(action);
                    $("#twofactoreFormPassword").val(result.value);
                    $("#twofactoreForm").submit();
                }
            });
    }

</script>
@endpush

@endif
