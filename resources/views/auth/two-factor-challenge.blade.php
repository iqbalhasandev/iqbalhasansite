<x-auth-layout>
    <x-auth-card>
        <x-slot name="title">
            <h5 class="text-primary mb-2 mt-4">Two Factor Challenge !</h5>
            <p class="text-muted">
                Check Your Google Authenticator Application And Entering The
                Authentication Code.
            </p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <h5 class="mb-4  text-success">
            {{ session('status') }}
        </h5>
        @endif

        <div x-data="{ recovery: false }">
            <p class="mb-4 text-sm text-secondary" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your
                authenticator application.') }}
            </p>

            <p class="mb-4 text-sm text-secondary" x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </p>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" class="form-horizontal mt-4 pt-2" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <label for="code">{{ __('Code') }}</label>
                    <input id="code" class="form-control" type="text" inputmode="numeric" name="code" autofocus
                        x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-show="recovery">
                    <label for="recovery_code">{{ __('Recovery Code') }}</label>
                    <input id="recovery_code" class="form-control" type="text" name="recovery_code"
                        x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="d-flex align-items-center justify-content-end mt-4">
                    <button type="button" class="text-sm text-muted btn btn-inline" x-show="! recovery" x-on:click="
                                                recovery = true;
                                                $nextTick(() => { $refs.recovery_code.focus() })
                                            ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-sm text-muted btn btn-inline" x-show="recovery" x-on:click="
                                                recovery = false;
                                                $nextTick(() => { $refs.code.focus() })
                                            ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <button class="btn btn-primary w-100 waves-effect waves-light">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>

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
