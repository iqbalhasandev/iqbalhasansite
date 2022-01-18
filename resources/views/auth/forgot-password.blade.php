<x-auth-layout>
    <x-auth-card>
        <x-slot name="title">
            <h5 class="text-primary mb-2 mt-4">Forgot your password?</h5>
            <p class="text-muted">
                No problem. Just let us know your email address and we
                will email you a password reset link that will allow you to choose a new one.
            </p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <h5 class="mb-4  text-success">
            {{ session('status') }}
        </h5>
        @endif

        <form class="form-horizontal mt-4 pt-2" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required
                    autofocus />
            </div>

            <div>
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
        <x-slot name="footer">
            @if (Route::has('register'))
            <p>Don't have an account ?
                <a href="{{ route('register') }}" class="fw-bold text-white">
                    Register
                </a>
            </p>
            @endif
        </x-slot>
    </x-auth-card>
</x-auth-layout>
