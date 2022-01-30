<?php

namespace App\Models\Admin;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShortLink extends Model
{
    use HasFactory, WithCache;

    protected static $cacheKey = '_short_link_';
    protected $fillable = ['code', 'link', 'visitor'];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
    }

    public function url()
    {
        return \route('short.link.redirect', $this->code);
    }
}
