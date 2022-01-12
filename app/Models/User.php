<?php

namespace App\Models;

use App\Traits\WithCache;
use App\Models\Admin\UserStatus;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use WithCache;
    use HasRoles;

    protected static $cacheKey = '_users_';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_status_id',

        'bio',
        'address',
        'public_email',
        'company',
        'company_address',

        'website',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'skype',
        'github',

        'profile_photo_path'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     *
     * User Statuses
     *
     */
    const STATUES = [
        'Active' => 1,
        'Suspend' => 0
    ];


    public function status()
    {
        return $this->belongsTo(UserStatus::class, 'user_status_id');
    }
}
