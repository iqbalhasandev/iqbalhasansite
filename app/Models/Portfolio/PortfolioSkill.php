<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSkill extends Model
{
    use HasFactory, WithCache;
    protected $fillable = ['title', 'percentage'];
    protected static $cacheKey = '__portfolio_skill__';
}
