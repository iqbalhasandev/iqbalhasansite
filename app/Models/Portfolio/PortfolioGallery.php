<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfolioGallery extends Model
{
    use HasFactory, WithCache;

    protected static $cacheKey = '__portfolio_gallery__';
    protected static $cacheKeys = [
        '__group__'
    ];
    protected $fillable = ['image', 'caption', 'url', 'group'];


    public function image_url()
    {
        if ($this->image) return \upload_asset($this->image);
        return \config('theme.image.default');
    }

    /**
     *
     *
     * Short By Group
     *
     * return Group Data
     *
     */
    public function groups()
    {
        return Cache::rememberForever(self::$cacheKey . '__group__', function () {
            return $this->select('group')->distinct()->pluck('group');
        });
    }
}
