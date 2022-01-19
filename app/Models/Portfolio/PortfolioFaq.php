<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfolioFaq extends Model
{
    use HasFactory, WithCache;
    protected $fillable = ['question', 'answer'];
    protected static $cacheKey = '__portfolio_faq__';
}
