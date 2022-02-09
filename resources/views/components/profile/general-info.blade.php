@if (Laravel\Fortify\Features::canUpdateProfileInformation())
<div>
    <h3>Profile Information</h3>
    <p>Update your account's profile information and email address.</p>
    <hr>
</div>
<div class="content">
    <form enctype="multipart/form-data"
        action="{{ route('admin.user.profile.settings.update',['active_tab'=>'general-info']) }}" method="POST">
        @csrf
        <div class="form-group pt-1 pb-1">
            <label for="name" class="font-black">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"
                value="{{old('name')??$user->name }}">
            @error('name')
            <p class="text-danger pt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group pt-1 pb-1">
            <label for="email" class="font-black">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"
                value="{{old('email')??$user->email }}" required>
            @error('email')
            <p class="text-danger pt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="avatar" class="font-black">Avatar</label>
            <div class="p-2">
                <img src="{{ $user->profile_photo_url }}" class="img-thumbnail" id="UserImage" width="128px">
            </div>
            <input type="file" class="form-control" name="avatar" id="avatar" placeholder="select avatar image"
                onchange="get_img_url(this,'#UserImage')">
            @error('avatar')
            <p class="text-danger pt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-12 ">
            <div class="form-group pt-1 pb-1">
                <button type="submit" class="btn btn-primary btn-round">Save</button>
            </div>
        </div>
    </form>
</div>

@endif
@push('extra-scripts')
<script src="{{ admin_asset('js/img-src.min.js') }}"></script>
@endpush
