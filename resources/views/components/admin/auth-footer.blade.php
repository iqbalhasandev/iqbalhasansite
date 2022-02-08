<footer {{ $attributes->merge(['class'=>'text-center']) }}>
    <x-visitor />

    <div>
        {{ date('Y') }} © {{ config('app.name') }}.
    </div>
    <div>
        Crafted with <i class="mdi mdi-heart text-danger"></i> by <a {{ $attributes->merge(['class'=>'text-center']) }}
            href="https://iqbalhasan.dev"
            target="_blank">IQBAL
            HASAN</a>
    </div>
    </div>
</footer>
