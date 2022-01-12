<?php

namespace App\Models\Admin;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory, WithCache;

    protected static $cacheKey = '__user_status__';
    protected $fillable = ['name',];

    public function users()
    {
        return $this->hasMany(User::class, 'user_status_id');
    }
}
