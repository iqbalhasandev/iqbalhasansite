<li
    class="text-capitalize {{ $attributes['href'] && request()->url()==$attributes['href']?'active':'' }} {{isset($title)?'menu-title':''}} ">
    @isset($title)
    {{ $title }}
    @else
    <a class="{{ $attributes['href'] && request()->url()==$attributes['href']?'active':'' }} text-capitalize waves-effect "
        href="{{ $attributes['href']??'javascript: void(0);' }}">
        {{ $slot }}
    </a>
    @endisset
</li>
