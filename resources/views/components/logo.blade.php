@props(['type'=>'dark' ,'link'=>false])
@if ($link)
<a href='{{ config(' app.url') }}'>
    @endif
    @switch($type)
    @case('sm')
    <img src="{{ setting('site.logo_sm')?storage_asset(setting('site.logo_sm')):admin_asset('images/logo-sm.png') }}"
        alt="" style="width:45px">
    @break
    @case('light')
    <img src="{{ setting('site.logo_light')?storage_asset(setting('site.logo_light')):admin_asset('images/logo-light.png') }}"
        style="width:160px">
    @break
    @default
    <img src="{{ setting('site.logo_dark')?storage_asset(setting('site.logo_dark')):admin_asset('images/logo-dark.png') }}"
        style="width:160px">
    @endswitch
    {{ $link?'</a>':''}}
