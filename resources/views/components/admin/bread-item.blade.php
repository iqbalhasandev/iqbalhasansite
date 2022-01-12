<li class="breadcrumb-item {{ $attributes['class'] }}">
    @isset($attributes['class'])
    {{ $slot }}
    @else
    <a href="{{ $attributes['href']??'javascript: void(0);' }}">
        {{ $slot }}
    </a>
    @endisset
</li>
