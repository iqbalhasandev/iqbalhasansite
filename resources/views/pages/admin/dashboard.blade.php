<x-app-layout>

    <x-slot name="breadcrumb">
        <x-admin.breadcrumb>
            @foreach (config('theme.cdata.breadcrumb') as $i )
            <x-admin.bread-item href="{{ $i['link'] }}" class="{{ $i['link']?'':'active' }}">
                {{ $i['name'] }}
            </x-admin.bread-item>
            @endforeach
            <x-slot name="title">
                {{ config('theme.cdata.title') }}
            </x-slot>
        </x-admin.breadcrumb>
    </x-slot>

    <x-card>
        <x-slot name="title">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h4 class="">{{ config('theme.cdata.title') }}</h4>
                </div>
                <div class="m-5">
                    <date-time-component />
                </div>

            </div>
        </x-slot>

        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
            </div>
        </div>
    </x-card>
</x-app-layout>
