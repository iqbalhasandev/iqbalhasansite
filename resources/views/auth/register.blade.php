<x-auth-layout>
    <x-auth-card>
        <x-slot name="title">
            <h5 class="text-primary mb-2 mt-4">Welcome To New Journey !</h5>
            <p class="text-muted">Sign up to continue to {{ config('app.name') }}.</p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <h5 class="mb-4  text-success">
            {{ session('status') }}
        </h5>
        @endif

        <form class="form-horizontal mt-4 pt-2" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required
                    autofocus />
            </div>
            <div class="mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required />
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
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register</button>
            </div>
            <div class="mt-4 text-center">
                <p class="mb-0">By registering you agree to the {{ config('app.name') }}
                    <a href="javascript:void();" class="text-primary">Terms of Use</a>
                </p>
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
