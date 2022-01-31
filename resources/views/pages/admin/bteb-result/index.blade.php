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
                    <h4 class="text-capitalize">{{ config('theme.cdata.title') }}</h4>
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

        <div class="row">
            <div class="table-responsive">
                <x-data-table>
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Session</th>
                            <th>4th Semester</th>
                            <th>5th Semester</th>
                            <th>6th Semester</th>
                            <th>7th Semester</th>
                            <th>8th Semester</th>
                            <th class="noExport">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($collection as $key=>$item)
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $item->session }}
                        </td>
                        <td>
                            @if ($item->url('4th'))
                            <a href="{{ $item->url('4th') }}" target="_blank">View</a>
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if ($item->url('5th'))
                            <a href="{{ $item->url('5th') }}" target="_blank">View</a>
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if ($item->url('6th'))
                            <a href="{{ $item->url('6th') }}" target="_blank">View</a>
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if ($item->url('7th'))
                            <a href="{{ $item->url('7th') }}" target="_blank">View</a>
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if ($item->url('8th'))
                            <a href="{{ $item->url('8th') }}" target="_blank">View</a>
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            <x-btn.action :edit="[route(config('theme.cdata.route-name-prefix').'.edit',$item->id)]"
                                :delete="[route(config('theme.cdata.route-name-prefix').'.delete',$item->id)]" />
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <p class="text-muted text-center">No Data Found...</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </x-data-table>
            </div>
        </div>
    </x-card>

    @push('extra-scripts')
    @endpush
</x-app-layout>
