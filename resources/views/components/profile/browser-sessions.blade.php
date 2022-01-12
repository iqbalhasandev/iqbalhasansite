<div>
    <h3>Browser Sessions</h3>
    <p>Manage and log out your active sessions on other browsers and devices.</p>
    <hr>
</div>
<div class="content">
    <div class="max-w-xl text-sm text-gray-600">
        If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your
        recent
        sessions are listed below; however, this list may not be exhaustive. If you feel your account has been
        compromised, you
        should also update your password.
    </div>
    @if (count($data['sessions']) > 0)
    <div class="mt-5 space-y-6">
        <!-- Other Browser Sessions -->
        @foreach ($data['sessions'] as $session)
        <div class="d-flex align-items-center">
            <div>
                @if ($session->agent->isDesktop())
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                    stroke="currentColor" class="text-gray" style="width: 24px;">
                    <path
                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-gray" style="width: 24px;">
                    <path d="M0 0h24v24H0z" stroke="none"></path>
                    <rect x="7" y="4" width="10" height="16" rx="1"></rect>
                    <path d="M11 5h2M12 17v.01"></path>
                </svg>
                @endif
            </div>

            <div class="ml-3">
                <div class="text-sm text-gray">
                    {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                </div>

                <div>
                    <div class="text-xs text-gray-500">
                        {{ $session->ip_address }},

                        @if ($session->is_current_device)
                        <span class="text-green-500 font-semibold">This device</span>
                        @else
                        Last active
                        {{ $session->last_active }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    <div class="form-group mt-10">
        <button type="button" onclick="PaaswordConfrim()" class="btn btn-danger">Log Out Other Browser Sessions</button>
    </div>
</div>

<form action="{{ route('admin.user.profile.settings.update',['active_tab'=>'browser-sessions']) }}"
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
