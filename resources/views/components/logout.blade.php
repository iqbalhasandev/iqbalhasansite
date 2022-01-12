<form method="POST" action="{{ route('logout') }}" class="d-inline">
    @csrf
    <button type="submit" style="
    width: 100%;
    margin: 0;
    padding: 0;
    display: inherit;
    background: transparent;
    color: transparent;
    border: transparent;
    outline: transparent;
" {{ $attributes }}>
        {{ $slot }}
    </button>
</form>
