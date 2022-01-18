<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageBuilder extends Model
{
    use HasFactory, WithCache;
    protected static $cacheKey = '__page_builder__';
    protected $fillable = [
        'title',
        'slug',
        'meta_keywords',
        'status',
        'body',
        'image'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
