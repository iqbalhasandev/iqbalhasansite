<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioClient extends Model
{
    use HasFactory, WithCache;

    protected $fillable = ['name', 'logo', 'site'];

    protected static $cacheKey = '__portfolio_client__';


    public function logo_url()
    {
        if ($this->logo) return \upload_asset($this->logo);
        return \config('theme.image.default');
    }
}
