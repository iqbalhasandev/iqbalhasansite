<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioTestimonial extends Model
{
    use HasFactory, WithCache, WithCache;
    protected static $cacheKey = '__portfolio_testimonial__';
    protected $fillable = ['image', 'name', 'quote'];


    public function image_url()
    {
        if ($this->image) return \upload_asset($this->image);
        return \config('theme.image.default');
    }
}
