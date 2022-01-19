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

    <x-card class="container">
        <x-slot name="title">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <h4 class="text-capitalize">
                        {{ config('theme.cdata.title') }}
                    </h4>
                </div>
                <div class="text-capitalize">
                    @if (config('theme.cdata.add'))
                    <a href="{{ config('theme.cdata.add') }}"
                        class="btn btn-primary btn-rounded waves-effect waves-light">
                        <i class="far fa-plus-square"></i> Add New
                    </a>
                    @endif

                    @if (config('theme.cdata.back'))
                    <a href="{{ config('theme.cdata.back') }}"
                        class="btn btn-info btn-rounded waves-effect waves-light">
                        <i class="fas fa-reply"></i> Back
                    </a>
                    @endif
                </div>
            </div>
        </x-slot>
        <div class="row" style="padding: 50px 0">
            <div class="col-sm-12">
                <table class="table table-hover">

                    <tr>
                        <td>Name</td>
                        <td>{{ $item->name??'-' }}</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>{{ $item->email??'-' }}</td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>{{ $item->subject??'-' }}</td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td>{{ $item->message??'-' }}</td>
                    </tr>

                    <tr>
                        <td>Project File</td>
                        <td>
                            @if ($item->file )
                            <a href="{{ $item->file_url() }}" target="_blank">View</a>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </x-card>
</x-app-layout>
