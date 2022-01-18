<x-auth-layout>
    <x-auth-card>
        <x-slot name="title">
            <h5 class="text-primary mb-2 mt-4">Welcome Back !</h5>
            <p class="text-muted">Sign in to continue to {{ config('app.name') }}.</p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <h5 class="mb-4  text-success">
            {{ session('status') }}
        </h5>
        @endif

        <form class="form-horizontal mt-4 pt-2" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required
                    autofocus />
            </div>

            <div class="mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember_me">
                    <label class="form-label" for="remember_me">Remember me</label>
                </div>
            </div>
            <div>
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
            </div>


            <div class="mt-4 text-center">
                @if (Route::has('password.request'))
                <a class="text-muted" href="{{ route('password.request') }}">
                    <i class="mdi mdi-lock me-1"></i>
                    {{ __('Forgot your password?') }}
                </a>
                @endif
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
