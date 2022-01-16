<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioService extends Model
{
    use HasFactory, WithCache;
    protected static $cacheKey = '__portfolio_service__';
    protected $fillable = ['title', 'description', 'image'];


    public function image_url()
    {
        if ($this->image) return \upload_asset($this->image);
        return \config('theme.image.default');
    }
}
