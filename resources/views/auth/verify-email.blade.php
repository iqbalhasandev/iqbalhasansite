<x-auth-layout>
    <x-auth-card>
        <x-slot name="title">
            <h5 class="text-primary mb-2 mt-4">Welcome Back !</h5>
            <p class="text-muted">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                link we just
                emailed to you? If you didn\'t receive the email, we will gladly send you another.
            </p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4  text-success">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
        @endif

        <form class="form-horizontal mt-4 pt-2" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">
                    Resend Verification Email
                </button>
            </div>
        </form>
        <form class="form-horizontal mt-4 pt-2" method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-danger w-100 waves-effect waves-light">
                {{ __('Log Out') }}
            </button>
        </form>
    </x-auth-card>
</x-auth-layout>
