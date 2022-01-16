<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioEducation extends Model
{
    use HasFactory, WithCache;

    protected static $cacheKey = '__portfolio_education__';

    protected $fillable = ['title', 'description', 'start', 'end'];
}
