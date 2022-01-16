<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioExpertise extends Model
{
    use HasFactory, WithCache;
    protected $fillable = ['name', 'title', 'description', 'start', 'end',];

    protected static $cacheKey = '__portfolio_expertise__';
}
