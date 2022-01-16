<li class="text-capitalize {{ $attributes['href'] && request()->url()==$attributes['href']?'active':'' }}">
    <a class="{{ $attributes['href'] && request()->url()==$attributes['href']?'active':'' }} text-capitalize waves-effect has-arrow"
        href="{{ $attributes['href']??'javascript: void(0);' }}">
        {{ $title }}
    </a>
    <ul class="sub-menu" aria-expanded="false">
        {{ $slot }}
    </ul>

</li>
