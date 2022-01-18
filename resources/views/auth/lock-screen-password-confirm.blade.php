<x-auth-layout>
    <x-auth-card>
        <x-slot name="title">
            <h5 class="text-primary mb-2 mt-4">Security Checkpoint !</h5>
            <p class="text-muted">
                This is a secure area of the application. Please confirm your password before
                continuing.
            </p>
        </x-slot>
        <x-validation-errors class="mb-4" />
        @if (session('status'))
        <h5 class="mb-4  text-success">
            {{ session('status') }}
        </h5>
        @endif

        <form class="form-horizontal mt-4 pt-2" method="POST" action="{{ route('admin.lock-screen.unlock') }}">
            @csrf
            <div class="mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" readonly value="{{ $email }}" />
            </div>
            <div class="mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password"
                    autocomplete="current-password" autofocus />
            </div>

            <div>
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-auth-layout>
