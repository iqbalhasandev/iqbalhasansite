@props(['modal'=>false,'close'=>null])
@if ($modal)
<div {{ $attributes->merge(['class'=>'swal2-container swal2-center swal2-backdrop-show','style'=>'overflow-y: hidden;'])
    }}>
    <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show"
        tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
        <button wire:click="{{ $close }}" type="button" class="swal2-close" aria-label="Close this dialog"
            style="display: flex;">×</button>
        <div class="swal2-header">
            {{ $header??'' }}
        </div>
        <div class="swal2-content">
            {{ $slot }}
        </div>
        <div class="swal2-actions">
            {{ $actions??'' }}
        </div>
    </div>
</div>
@endif
