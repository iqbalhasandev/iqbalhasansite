<h5 class="greet">{!! portfolio_setting('banner.greet') !!}</h5>
<h1 class="skills cd-headline clip">I'm a
    <span class="cd-words-wrapper single-skill">
        @if (portfolio_setting('banner.skill_clip'))
        @foreach (json_decode(portfolio_setting('banner.skill_clip')) as $key=>$skill_clip)
        <b class="@if($key==0) is-visible @endif">{{ $skill_clip }}</b>
        @endforeach
        @endif
    </span>
</h1>
<p class="description">{!! portfolio_setting('banner.details') !!}</p>


@if (portfolio_setting('banner.button'))
<?php $key=0; ?>
@foreach (json_decode(portfolio_setting('banner.button')) as $display_title=>$url)

@if ($key==0)
<a class="btn work" data-scroll href="{{ $url }}" role="button">{{ $display_title }}</a>
@else
<a class="btn hire button-scheme" data-scroll href="{{ $url }}" role="button">{{ $display_title }}</a>
@endif
<?php $key++; ?>
@endforeach
@endif
