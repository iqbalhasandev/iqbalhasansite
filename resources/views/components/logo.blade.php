@props(['type'=>'dark' ,'link'=>false])
@if ($link)
<a href='{{ config(' app.url') }}'>
    @endif
    @switch($type)
    @case('sm')
    <img src="{{ admin_asset('images/logo-sm.png') }}" alt="" height="28">
    @break
    @case('light')
    <img src="{{ admin_asset('images/logo-light.png') }}" alt="" height="20">
    @break
    @default
    <img src="{{ admin_asset('images/logo-dark.png') }}" alt="" height="20">
    @endswitch
    {{ $link?'</a>':''}}
