@if ($errors->any())
<div {{ $attributes }}>
    <div class="fs-6 text-danger">{{ __('Whoops! Something went wrong.') }}</div>

    <ul class="mt-3 text-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
