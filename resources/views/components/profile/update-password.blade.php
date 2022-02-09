@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
<div>
    <h3>Update Password</h3>
    <p>Ensure your account is using a long, random password to stay secure.</p>
    <hr>
</div>
<div class="content">
    <form enctype="multipart/form-data"
        action="{{ route('admin.user.profile.settings.update',['active_tab'=>'update-password']) }}" method="POST">
        @csrf
        <div class="form-group pt-1 pb-1">
            <label for="current_password" class="font-black">Current Password</label>
            <input type="password" class="form-control" name="current_password" id="current_password"
                placeholder="Enter Current Password" required>
            @error('current_password')
            <p class=" text-danger pt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group pt-1 pb-1">
            <label for="password" class="font-black">New Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password"
                required>
            @error('password')
            <p class="text-danger pt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group pt-1 pb-1">
            <label for="password_confirmation" class="font-black">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                placeholder="Enter Confirm Password" required>
            @error('password_confirmation')
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
