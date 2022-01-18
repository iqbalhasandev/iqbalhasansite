<x-auth-layout>
    <x-auth-card>
        <x-slot name="title">
            <h5 class="text-primary mb-2 mt-4">Reset Password !</h5>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <h5 class="mb-4  text-success">
            {{ session('status') }}
        </h5>
        @endif

        <form class="form-horizontal mt-4 pt-2" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email"
                    value="{{ old('email', $request->email) }}" required />
            </div>

            <div class="mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="new-password" />
            </div>
            <div class="mb-3">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                    required autocomplete="new-password" />
            </div>
            <div>
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Reset Password</button>
            </div>
        </form>
        <x-slot name="footer">
            @if (Route::has('register'))
            <p>Already registered? ?
                <a href="{{ route('login') }}" class="fw-bold text-white">
                    LogIn
                </a>
            </p>
            @endif
        </x-slot>
    </x-auth-card>
</x-auth-layout>
