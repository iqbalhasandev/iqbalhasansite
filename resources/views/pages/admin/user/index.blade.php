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
                <div>
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
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="noExport">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key=>$user)
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {!! get_user_role($user)->name??'<span class="badge badge-danger">User role not
                                selected</span>' !!}
                        </td>
                        <td>
                            @can('user_edit')
                            <select name="status_id" id="status_id_{{ $user->id}}" class="form-control"
                                onchange="userStatusUpdate('{{ route('user.statusUpdate',$user->id) }}',{{ $user->id }},{{ $user->user_status_id }})">
                                @foreach (App\Models\Admin\UserStatus::cacheData() as $status)
                                <option {{ selected($status->id,$user->user_status_id)?'selected':''
                                    }} value="{{ $status->id }}">
                                    {{ $status->name }}
                                </option>
                                @endforeach
                            </select>
                            @else
                            {{ $user->status->name }}
                            @endcan
                        </td>
                        <td>
                            <x-btn.action :view="[route('admin.user.show',$user->id)]"
                                :edit="[route('admin.user.edit',$user->id)]"
                                :delete="[route('admin.user.delete',$user->id)]" />
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
    <script src="{{ admin_asset('js/user-status-update.js') }}"></script>
    @endpush
</x-app-layout>
