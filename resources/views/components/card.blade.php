<div class="card">
    <div {{ $attributes->merge(['class'=>'card-body']) }}>
        @isset($title)
        <div class="header-title mt-1 mb-5">
            {{ $title }}
        </div>
        @endisset
        <div class="p-4" style="min-height: 300px;">
            {{ $slot }}
        </div>

    </div>
</div>
