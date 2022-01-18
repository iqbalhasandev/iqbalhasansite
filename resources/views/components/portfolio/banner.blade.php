@props(['variant','aligment'])
<!--=====================================================
            ------------ banner Area (Home) Start-----------
        ========================================================-->

<section class="header-area section-fixed-bg section-overlay-bg" id="header-area"
    style="background-image: url({{ portfolio_setting('banner.image')?storage_asset(portfolio_setting('banner.image')):portfolio_asset('img/header-area.jpg') }}); background-size: cover;">
    <div id="particles-js"></div>

    @switch($variant)
    @case('left-align')
    <div class="container h-100">
        <div class="row h-100 align-items-center @if($aligment=='center')
        justify-content-center
        @endif">
            <div class="col-12 col-lg-8 home-content @if($aligment=='center')
        text-center
        @else
        text-left
        @endif">
                <x-portfolio.banner.content />
            </div>
            <x-portfolio.banner.wheel />
        </div>
    </div>
    <x-portfolio.banner.wheel />
    @break
    @case('nexus')
    <div class=" container h-100">
        <div class="row h-100 align-items-center @if($aligment=='center')
        justify-content-center
        @endif
        ">
            <div class="col-12 col-lg-8 home-content @if($aligment=='center')
        text-center
        @else
        text-left
        @endif">
                <x-portfolio.banner.content />
            </div>
            <x-portfolio.banner.wheel />
        </div>
    </div>
    <svg class="nexus-shape" viewBox="0 0 1350 70" preserveAspectRatio="none">
        <path d="M0 17 562 68 948 0 1366 68 1366 144 0 144 0 17z"></path>
    </svg>
    @break
    @case('triangle')
    <div class="container h-100">
        <div class="row h-100 align-items-center @if($aligment=='center')
        justify-content-center
        @endif">
            <div class="col-12 col-lg-8 home-content @if($aligment=='center')
        text-center
        @else
        text-left
        @endif">
                <x-portfolio.banner.content />
            </div>
            <x-portfolio.banner.wheel />
        </div>
    </div>
    <svg class="triangle-shape" viewBox="0 0 1366 80" preserveAspectRatio="none">
        <path d="M0 0 683 75 1366 0 1366 150 0 150 0 0z"></path>
    </svg>
    @break
    @case('wave')
    <div class="container h-100">
        <div class="row h-100 align-items-center @if($aligment=='center')
        justify-content-center
        @endif">
            <div class="col-12 col-lg-8 home-content @if($aligment=='center')
        text-center
        @else
        text-left
        @endif">
                <x-portfolio.banner.content />
            </div>
        </div>
    </div>
    <svg class="wave-shape" viewBox="0 23 500 32" preserveAspectRatio="none">
        <path d="M-237.97,103.13 C201.53,-102.13 318.14,183.05 741.62,-36.02 L655.95,547.25 L-381.89,482.11 Z"
            stroke="none" fill="#fff"></path>
    </svg>
    @break
    @default
    <div class="container h-100">
        <div class="row h-100 align-items-center @if($aligment=='center')
        justify-content-center
        @endif">
            <div class="col-12 col-lg-8 home-content @if($aligment=='center')
        text-center
        @else
        text-left
        @endif">
                <x-portfolio.banner.content />
            </div>
            <x-portfolio.banner.wheel />
        </div>
    </div>

    @endswitch






</section>
<!--=====================================================
         ------------- banner Area (Home) End-------------
    ========================================================-->
